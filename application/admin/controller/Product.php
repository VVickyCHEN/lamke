<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use app\admin\model\Category;
use app\admin\model\Product as ProductModel;

class Product extends Base
{
    //多图上传页
    public function demo(Request $request){
        //标记是否是编辑修改页面传来的值 flag=1是编辑页
        if ($request->param('flag')){
            $flag=1;
        }else{
            $flag="";
        }
        $id=$request->param('id');
        $this->assign("id",$id);
        $this->assign("flag",$flag);
        return $this->fetch();
    }
    //图片上传，返回文件保存名
    public function upload(Request $request){
        $image=$request->param(true);
        $image=$image["file_data"];
        if($image){
            $info = $image->move(ROOT_PATH . 'public' . DS . 'uploads');
            if (is_null($info)) {
                $this->error($info->getError());
            }else{
                return $info->getSaveName();
            }
        }
    }
    //保存多图上传路径到数据表
    public function savePath(Request $request){
        $id=$request->param('id');
        $imgPath=$request->param('image');
        if ($request->param('flag')==1){//编辑修改页，先删除先前图片再保存新的路径
            $oldImg=ProductModel::where('id',$id)->value('image');
            $oldImg=substr($oldImg,0,-1);
            $oImg=explode(',',$oldImg);
            foreach($oImg as $val)
            {
                @unlink(ROOT_PATH . 'public/uploads/' . $val);
            }
        }
        $res=ProductModel::update(['image'=>$imgPath],['id'=>$id]);
        if ($res){
            return 1;
        }else{
            return -1;
        }
    }
    /**
     * 显示产品管理列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
//        搜索
        $map="";
//        dump($request->param());
        $cate_id=$request->param('cate_id');
        $logMin=strtotime($request->param('logMin'));
        $logMax=strtotime($request->param('logMax'));
        $info=$request->param('info');
        if ($cate_id!=""){
            //如果选择有下级的分类，要查询所有下级分类id
            $where[] = ['exp', "FIND_IN_SET($cate_id,cate_path)"];
            $cate_ids=Category::where($where)->column('id');
            array_push($cate_ids,$cate_id);
            if (empty($cate_ids)){
                $map['cate_id']=$cate_id;
            }else{
                $map['cate_id']=array('in',$cate_ids);
            }
        }
        if ($logMin!=""||$logMax!=""){
            if ($logMax!=""){
                $logMax+=+3600*24;
            }
            $map['time']=array('between', array($logMin, $logMax));
        }
        if ($info!=""){
            $map['name_cn|name_en']=array('like','%' . $info . '%');
        }
        //获取分类
        $cateList = Category::getCate();
        $product = ProductModel::where($map)->order('id', 'desc')->paginate(8);
        $count = ProductModel::count();
        //分类名称
        foreach ($product as $key => $value){
            $cate=Category::where(array('id'=>$value['cate_id']))->find();
            $path=$cate['id'] .",".$cate['cate_path'];
            $pid = explode(',',$path);
            $countP=count($pid);
            for ($i=0;$i<$countP;$i++){
//                dump($i);
                $p_name[$i] = Category::where(['id'=>$pid[$i]])->value('cate_name_cn');
                $p_name2[$i] = Category::where(['id'=>$pid[$i]])->value('cate_name_en');
//                dump(Category::where(['id'=>$pid[$i]])->value('cate_name'));
            }
//            dump($i);
//            dump($p_name);
//            exit();
            $p_name_cn=implode('<<--',$p_name);
            $p_name_en=implode('<<--',$p_name2);
            $product[$key]['p_name']=$p_name_cn.'('.$p_name_en.')';
            $product[$key]['name']=$value['name_cn'].'---'.$value['name_en'];
        }


        //分页标记，0显示分页；
        $status = 0;
        //模板赋值
        $this->assign('cate', $cateList);
        $this->assign('product', $product);
        $this->assign('count', $count);
        $this->assign('status', $status);
        return $this->fetch('product_list');

    }

    //添加
    public function create()
    {
        //获取分类
        $cate = Category::getCate();
        $this->assign('cate', $cate);
        return $this->fetch('product_add');
    }

    /**
     * 保存添加
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //判断提交类型
        if ($this->request->isPost()) {
            //获取提交数据吗，true包含上传文件
            $data = $this->request->param(true);
            //获取上传的文件对象
            $file = $this->request->file('simg');
            //判断是否获取到文件
            if (empty($file)) {
                $this->error('请上传图片');
            } else {
                //限定格式
                $map = [
                    'ext' => 'jpg,png',
                    'size' => 3000000,
                ];
                //校验并上传文件
                $info = $file->validate($map)->move(ROOT_PATH . 'public/uploads');
                //如果上传失败，错误提示
                if (is_null($info)) {
                    $this->error($file->getError());
                }
                //获取保存文件名，存在simg中
                $data['simg'] = $info->getSaveName();
            }
            //向表中新增数据
            $res = ProductModel::create($data);
            //获取当前时间戳
            $res->save(['time' => time()]);
            if (is_null($res)) {
                $this->error('添加失败',url('product/create'));
            } else {
                $this->redirect(url("demo",['id'=>$res->id]));
            }
        } else {
            $this->error('请求类型错误');
        }

    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        $res = ProductModel::get($id);
        $cate = Category::getCate();
        $cate_id = $res['cate_id'];
//        当前分类名称
        $cate_name = Category::where('id', $cate_id)->value('cate_name_cn');
        $cate_name_en = Category::where('id', $cate_id)->value('cate_name_en');
        $cate_name=$cate_name.'-----'.$cate_name_en;
//        当前产品轮播图
        $img = explode(',', rtrim($res['image'], ','));
        $this->assign('cate', $cate);
        $this->assign('pro', $res);
        $this->assign('cate_name', $cate_name);
        $this->assign('image', $img);
        return $this->fetch('product_edit');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //更新操作
        if ($this->request->isPost()) {
            //获取提交数据吗，true包含上传文件
            $data = $this->request->param(true);
            //获取上传的文件对象
            $file = $this->request->file('simg');
            //判断是否获取到文件,没获取的话赋image 之前记录值
            if (empty($file)) {
                $data['simg'] = ProductModel::where('id', $id)->value('simg');
            } else {
                //如果获取到文件，上传文件并存在image中
                //限定格式
                $map = [
                    'ext' => 'jpg,png',
                    'size' => 3000000,
                ];
                //校验并上传文件
                $info = $file->validate($map)->move(ROOT_PATH . 'public/uploads');
                //如果上传失败，错误提示
                if (is_null($info)) {
                    $this->error($file->getError());
                }
                //获取保存文件名，存在image中
                $data['simg'] = $info->getSaveName();

            }

            $data['image'] = ProductModel::where('id', $id)->value('image');
            //向表中修改数据
            $res = ProductModel::update([
                'name_cn' => $data['name_cn'],
                'name_en' => $data['name_cn'],
                'goods_num' => $data['goods_num'],
                'price' => $data['price'],
                'oldprice' => $data['oldprice'],
                'recommend' => $data['recommend'],
                'simg' => $data['simg'],
                'cate_id' => $data['cate_id'],
                'desc_cn' => $data['desc_cn'],
                'desc_en' => $data['desc_en'],
                'image' => $data['image'],
                'details_cn' => $data['details_cn'],
                'details_en' => $data['details_en']
            ], ['id' => $id]);

            //判断是否新增成功
            if (is_null($res)) {
                $this->error('修改失败');
            } else {
                $this->success('修改成功',url('index'));
            }

        } else {
            $this->error('请求类型错误');
        }
    }

    public function delete($id)
    {
        //
        $pic=ProductModel::where(array('id'=>$id))->value('image');
        $img=explode(',',$pic);
        foreach ($img as $k){
            @unlink(ROOT_PATH . 'public/uploads/' . $k);
        }
        $simg=ProductModel::where(array('id'=>$id))->value('simg');

        @unlink(ROOT_PATH . 'public/uploads/' . $simg);
        ProductModel::destroy($id);
    }

    /**
     * 批量删除指定资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function delAll(Request $request)
    {
        $ids = $request->param();

        $pic=ProductModel::where(array('id'=>array('in',$ids["ids"])))->column('image');
        foreach ($pic as $key){//删除产品轮播图
            $key=substr($key,0,-1);
            $img=explode(',',$key);
            foreach ($img as $k){
                @unlink(ROOT_PATH . 'public/uploads/' . $k);
            }
        }
        $simg=ProductModel::where(array('id'=>array('in',$ids["ids"])))->column('simg');
        foreach ($simg as $k){//删除产品缩略图
            @unlink(ROOT_PATH . 'public/uploads/' . $k);
        }
        $count = count($ids['ids']);
        //删除当前数据
        for ($i = 0; $i < $count; $i++) {
            $res = ProductModel::destroy($ids['ids'][$i]);
        }
        if (is_null($res)) {
            $this->error('删除失败');
        } else {
            $this->success('删除成功,已删除' . $count . '条数据');
        }
    }


    /**
     * 搜索资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function search(Request $request)
    {
        $lang=$request->param();
        //分页标记，1不显示
        $status = 1;
        $pid=0;$result=[];$blank=0;
        $cateList = Category::getCate($pid,$result,$blank,$lang['lang']);
        $res = $request->param();
        //获取时间查询条件
        $logMin = strtotime($res['logMin']);
        $logMax = strtotime($res['logMax']);
        //获取info查询条件
        $info = $res['info'];
        $cate_id = $res['cate'];
        if ($logMax == "" && $info == "" && $cate_id == 0) {
            //当查询条件最高日期且其他为空时，按>=$logMin值查询
            $map['last_time'] = array('egt', $logMin);
        } else if ($logMin == "" && $info == "" && $cate_id == 0) {
            //当查询条件最低日期且其他为空时，按<=$logMax值查询
            $map['last_time'] = array('elt', $logMax);
        } else if ($logMax == "" && $logMin == "" && $cate_id == 0) {
            //当查询条件日期为空时，按其他条件查询
            $map['last_name'] = array('like', '%' . $info . '%');
        } else if ($info == "" && $cate_id == 0) {
            //当其他条件为空时，按日期范围搜索
            $map['last_time'] = array('between', array($logMin, $logMax));
        } else if ($logMax == "" && $cate_id == 0) {
            //当最高日期为空时，按>=$logMin 和name查询
            $map['last_time'] = array('egt', $logMin);
            $map['name'] = array('like', '%' . $info . '%');
        } else if ($logMin == "" && $cate_id == 0) {
            //当最低日期为空时，按<=$logMax 和其他条件查询
            $map['last_time'] = array('elt', $logMax);
            $map['name'] = array('like', '%' . $info . '%');
        } else if ($cate_id != 0) {
            $map['cate_id|cate_path'] = $cate_id;
        } else {
            //当日期和其他条件都有时，按条件查询
            $map['last_time'] = array('between', array($logMin, $logMax));
            $map['name'] = array('like', '%' . $info . '%');
        }
        //实例化ProductModel
        $product = new ProductModel();
        //按条件获取表数据
        $res = $product->where($map)->order('id', 'desc')->select();
        //计数
        $count = $product->where($map)->count();
        //模板赋值
        $this->assign('status', $status);
        $this->assign('product', $res);
        $this->assign('count', $count);
        $this->assign('cate', $cate);
        return $this->fetch('product_list');

    }

    /**
     * 上架
     *
     * @param  int $id
     * @return \think\Response
     */
    public function shield($id)
    {
        //屏蔽当前数据
        ProductModel::where('id', $id)
            ->update(['status' => '0']);
    }

    /**
     * 下架
     *
     * @param  int $id
     * @return \think\Response
     */
    public function start($id)
    {
        //屏蔽当前数据
        ProductModel::where('id', $id)
            ->update(['status' => '1']);
    }


    //展示分类管理页
    public function showType(Request $request)
    {
////        语言
//        $lang=$request->param('lang');
        //分页标记，0显示分页；
        $status = 0;
        //获取在model处理过的分类列表

        $cateList = Category::getCate();
        //用模型获取分页数据
        $cate_list = Category::order('id', 'desc')->paginate(10);
        //上级分类名称
        foreach ($cate_list as $key => $value) {
            $pid = explode(',', $cate_list[$key]['cate_path']);
            $map['id']=array('in',$pid);
            $p_name_cn = Category::where($map)->column('cate_name_cn');
            $p_name_cn=implode(',',$p_name_cn);
            $p_name_en = Category::where($map)->column('cate_name_en');
            $p_name_en=implode(',',$p_name_en);
            $cate_list[$key]['p_name']=$p_name_cn.'('.$p_name_en.')';
            if ($cate_list[$key]['pid']==0){
                $cate_list[$key]['p_name']="顶级分类";
            }
            $cate_list[$key]['cate_name']=$value->cate_name_cn.'---'.$value->cate_name_en;
        }
        $page = $cate_list->render();
        //获取记录数量
        $count = Category::count();
        //模板赋值
        $this->assign('page', $page);
        $this->assign('cate_list', $cate_list);
        $this->assign('count', $count);
        $this->assign('cateList', $cateList);
        $this->assign('status', $status);
//        $this->assign('lang', $lang);

        //显示分类管理
        return $this->fetch('product_category');

    }


    //处理添加分类
    public function saveCategory(Request $request)
    {
        //获取页面传来的值
        $data = $this->request->param();
        //cate_path 赋值
        if ($data['pid'] == 0) {
            //当前选择的父级ID为0，为顶级分类，cate_path为0
            $cate_path = 0;
        } else {//其他子级
            //获取父级分类信息
            $pCate = Category::get($data['pid']);
            if ($pCate['pid'] == 0) {
                //父级的pid=0，cate_path为当前选择的父级ID
                $cate_path = $data['pid'];
            } else {
                //父级pid不为0，cate_path 为当前选择的父级id 加父级的cate_path
                $cate_path = $data['pid'] . ',' . $pCate['cate_path'];
            }
        }
        //新建数据
        $res = Category::create([
            'cate_name_cn' => $data['cate_name_cn'],
            'cate_name_en' => $data['cate_name_en'],
            'pid' => $data['pid'],
            'cate_path' => $cate_path,
        ]);
        //信息提示
        if (is_null($res)) {
            $this->error('添加失败', url('product/showType'));
        } else {
            $this->success('添加成功', url('product/showType'));
        }

    }

    //显示编辑页面
    public function editCategory(Request $request, $id)
    {
//        $lang=$request->param('lang');
        // 获取分类列表
        $cateList = Category::getCate();
        //根据前端传的id值查询
        $cate = Category::get($id);
        //搜索父级分类名
        $parent = Category::where('id', $cate['pid'])->value('cate_name_cn');
        $parent_en = Category::where('id', $cate['pid'])->value('cate_name_en');
        $parent=$parent.'-----'.$parent_en;
        //当前是几级分类
        if ($cate['cate_path']==0){
            $countPath="顶级分类";
        }else{
            //计算cate_path 个数
            $countPath = count(explode(',', $cate['cate_path']));
            $countPath ="第".($countPath+1)."级分类";
        }

        //模板赋值
        $this->assign('cateList', $cateList);
        $this->assign('cate', $cate);
        $this->assign('parent', $parent);
        $this->assign('countPath', $countPath);
//        $this->assign('lang', $lang);
        return $this->fetch('product_category_edit');

    }

    //跟新分类修改
    public function updateCategory(Request $request, $id)
    {
        $data = $this->request->param(true);
//        $file = $this->request->file('img');
        //cate_path 赋值
        if ($data['pid'] == 0) {
            //当前选择的父级ID为0，为顶级分类，cate_path为0
            $cate_path = 0;
        } else {//其他子级
            //获取父级分类信息
            $pCate = Category::get($data['pid']);
            if ($pCate['pid'] == 0) {
                //父级的pid=0，cate_path为当前选择的父级ID
                $cate_path = $data['pid'];
            } else {
                //父级pid不为0，cate_path 为当前选择的父级id 加父级的cate_path
                $cate_path = $data['pid'] . ',' . $pCate['cate_path'];
            }
        }
        $id = $data['id'];
        $cate = Category::get($id);
        $cate->cate_name_cn = $data['cate_name_cn'];
        $cate->cate_name_en = $data['cate_name_en'];
        $cate->pid = $data['pid'];
        $cate->cate_path = $cate_path;
        $res = $cate->save();
        if (is_null($res)) {
            $this->error('修改失败', url('product/showType'));
        } else {
            $this->success('修改成功',  url('product/showType'));
        }


    }

    //删除分类
    public function deleteCategory()
    {
//        $lang=$_POST['lang'];
        $id=$_POST['id'];
        $map[]=['exp',"FIND_IN_SET($id,cate_path)"];
//        //删除分类下的产品
        $cate_id=Category::where($map)->column('id');
        array_push($cate_id,$id);
        //删除图片
        $pic=ProductModel::where(array('cate_id'=>array('in',$cate_id)))->column('image');
        foreach ($pic as $key){
            $key=substr($key,0,-1);
            $img=explode(',',$key);
            foreach ($img as $k){
                @unlink(ROOT_PATH . 'public/uploads/' . $k);
            }
        }
        $simg=ProductModel::where(array('cate_id'=>array('in',$cate_id)))->column('simg');
        foreach ($simg as $k){//删除产品缩略图
            @unlink(ROOT_PATH . 'public/uploads/' . $k);
        }
        //删除数据行
        $delPro=ProductModel::where(array('cate_id'=>array('in',$cate_id)))->delete();
        //删除以当前id在多有cate_path出现过的所有子分类

        $delPCate= Category::where($map)->delete();
//        //删除当前分类
        $delCate = Category::destroy($id);
        if ($delPCate&&$delCate&&$delPro){//成功删除父分类及下面的子分类
            return 1;
        }else if($delCate){//成功删除单个没有下级的分类
            return 2;
        }else{
            return -1;
        }
    }

    /**
     * 搜索分类
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function cateSearch(Request $request)
    {
        $cate = Category::all();
        $cateList = Category::getCate();
        //分页标记1为不显示
        $status = 1;

        if ($this->request->isPost()) {
            $data = $request->param();
            //获取info查询条件
            $info = $data['info'];
            $cate_id = $data['cate'];
            if ($cate_id != 0 && $info == "") {
                $map['pid'] = $cate_id;
            } else if ($cate_id == 0) {
                $map['cate_name'] = array('like', '%' . $info . '%');
            } else {
                $map['pid'] = $cate_id;
                $map['cate_name'] = array('like', '%' . $info . '%');
            }
            //实例化ProductModel
            $cate_list = new Category();
            //按条件获取表数据
            $res = $cate_list->where($map)->order('id', 'desc')->select();
            //计数
            $count = $cate_list->where($map)->count();
            //模板赋值
            $this->assign('status', $status);
            $this->assign('cate_list', $res);
            $this->assign('count', $count);
            $this->assign('cate', $cate);
            $this->assign('cateList', $cateList);
            return $this->fetch('product_category');
        }
    }

    //分类批量删除
    public function cate_delAll(Request $request)
    {
        $check_id = $_POST['check_id'];
//        $map['cate_id|cate_path'] = $ids;
//        //删除分类下的产品
//        $pro = ProductModel::destroy(function ($query) use ($map) {
//            $query->where($map)->field('id');
//        });
        //删除以当前id在多有cate_path出现过的所有子分类
        foreach ($check_id as $k){
            $map[]=['exp',"FIND_IN_SET($k,cate_path)"];
            Category::where($map)->delete();
        }

//        删除当前分类
        $delCate = Category::destroy($check_id);
        if ($delCate){
            echo "删除成功";
        }else {
            echo "删除成功";
        }
    }
}
