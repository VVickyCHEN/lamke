<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\News as NewsModel;
use app\admin\model\News_cate;
use think\Request;

class News extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        //base 中的方法，判断是否有登录
        $this->isLogin();
        $map="";
//        dump($request->param());
        $cate_id=$request->param('cate_id');
        $logMin=strtotime($request->param('logMin'));
        $logMax=strtotime($request->param('logMax'));
        $info=$request->param('info');
        if ($cate_id!=""){
            //如果选择有下级的分类，要查询所有下级分类id
            $where[] = ['exp', "FIND_IN_SET($cate_id,cate_path)"];
            $cate_ids=News_cate::where($where)->column('id');
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
            $map['title_cn|title_en']=array('like','%' . $info . '%');
        }
        //获取分类
        $cateList = News_cate::getCate();
        //获取news表全部数据
        $res = NewsModel::where($map)->order('id desc')->paginate(10);
        foreach ($res as $key => $value) {
            $cate = News_cate::where(array('id' => $value['cate_id']))->find();
            $path = $cate['id'] . "," . $cate['cate_path'];
            $pid = explode(',', $path);
            $countP = count($pid);
            for ($i = 0; $i < $countP; $i++) {
//                dump($i);
                $p_name[$i] = News_cate::where(['id' => $pid[$i]])->value('cate_name_cn');
                $p_name2[$i] = News_cate::where(['id' => $pid[$i]])->value('cate_name_en');
//                dump(News_cate::where(['id'=>$pid[$i]])->value('cate_name'));
            }
//            dump($i);
//            dump($p_name);
//            exit();
            $p_name_cn = implode('<<--', $p_name);
            $p_name_en = implode('<<--', $p_name2);
            $res[$key]['p_name'] = $p_name_cn . '(' . $p_name_en . ')';
            $res[$key]['title'] = $value['title_cn'] . '---' . $value['title_en'];
        }
        //计数
        $count = NewsModel::count();
        $this->assign('news', $res);
        $this->assign('count', $count);
        $this->assign('cate', $cateList);
        return $this->fetch('article_list');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        //获取分类
        $cate = News_cate::getCate();
        $this->assign('cate', $cate);
        return $this->fetch('article_add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
//        //判断提交类型
//        if($this->request->isPost()){
//            //获取提交数据吗，true包含上传文件
//            $data=$this->request->param(true);
//            //获取上传的文件对象
//            $file=$this->request->file('img');
//            //判断是否获取到文件,没获取的话赋image null值
//            if(empty($file)){
//                $data['img']=null;
//            }else{//如果获取到文件，上传文件并存在image中
//
//                //限定格式
//                $map=[
//                    'ext'=>'jpg,png',
//                    'size'=>3000000,
//                ];
//                //校验并上传文件
//                $info=$file->validate($map)->move(ROOT_PATH.'public/uploads');
//                //如果上传失败，错误提示
//                if(is_null($info)){
//                    $this->error($file->getError());
//                }
//                //获取保存文件名，存在image中
//                $data['img']=$info->getSaveName();
//            }
        $data = $request->param();
        //向表中新增数据
        $res = NewsModel::create($data);
        //获取当前时间戳
        $res->save(['time' => time()]);
        //判断是否新增成功
        if (is_null($res)) {
            $this->error('添加失败');
        } else {
            $this->success('添加成功');
        }

//        }else{
//            $this->error('请求类型错误');
//        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //

    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //获取分类
        $cate = News_cate::getCate();
        $this->assign('cate', $cate);
        // 获取该条数据
        $res = NewsModel::get($id);
        //模板赋值
        $this->assign('news', $res);
        $cate_id = $res['cate_id'];
//        当前分类名称
        $cate_name = News_cate::where('id', $cate_id)->value('cate_name_cn');
        $cate_name_en = News_cate::where('id', $cate_id)->value('cate_name_en');
        $cate_name = $cate_name . '-----' . $cate_name_en;
        $this->assign('cate_name', $cate_name);
        //渲染
        return $this->fetch('article_edit');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function update(Request $request)
    {
        //更新数据
        //判断是否是传过来的值
//        if ($this->request->isPost()) {
//            //获取提交数据吗，true包含上传文件
//            $data = $this->request->param(true);
//            $id = $data['id'];
//            //获取上传的文件对象
//            $file = $this->request->file('img');
//            //判断是否获取到文件,没获取的话赋image 之前记录值
//            if (empty($file)) {
//                $data['img'] = NewsModel::where('id', $id)->value('img');
//            } else {
//                //如果获取到文件，上传文件并存在image中
//                //限定格式
//                $map = [
//                    'ext' => 'jpg,png',
//                    'size' => 3000000,
//                ];
//                //校验并上传文件
//                $info = $file->validate($map)->move(ROOT_PATH . 'public/uploads');
//                //如果上传失败，错误提示
//                if (is_null($info)) {
//                    $this->error($file->getError());
//                }
//                //获取保存文件名，存在image中
//                $data['img'] = $info->getSaveName();
//            }
        $data = $request->param();
        $id = $data['id'];
        //向表中修改数据
        $res = NewsModel::update([
            'title_cn' => $data['title_cn'],
            'title_en' => $data['title_en'],
            'content_cn' => $data['content_cn'],
            'content_en' => $data['content_en'],
            'abstract_cn' => $data['abstract_cn'],
            'abstract_en' => $data['abstract_en'],
            'cate_id'=>$data['cate_id'],
            'recommend' => $data['recommend']
        ], ['id' => $id]);


        //判断是否新增成功
        if (is_null($res)) {
            $this->error('修改失败');
        } else {
            $this->success('修改成功');
        }

//        } else {
//            $this->error('请求类型错误');
//        }

    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //删除当前数据
        NewsModel::destroy($id);
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
        $count = count($ids['ids']);
        //删除当前数据
        for ($i = 0; $i < $count; $i++) {
            $res = NewsModel::destroy($ids['ids'][$i]);
        }
        if (is_null($res)) {
            $this->error('删除失败');
        } else {
            $this->success('删除成功，已删除' . $count . '条数据');
        }
    }

    /**
     * 屏蔽指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function shield($id)
    {
        //屏蔽当前数据
        NewsModel::where('id', $id)
            ->update(['status' => '0']);
    }

    public function start($id)
    {
        //上架当前数据
        NewsModel::where('id', $id)
            ->update(['status' => '1']);
    }

    /**
     * 搜索资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function search(Request $request)
    {
        $res = $request->param();
        //获取时间查询条件
        $logMin = strtotime($res['logMin']);
        $logMax = strtotime($res['logMax']);
        //获取sFlag赋值给flag
        $flag = $res['sFlag'];
        //获取info查询条件
        $info = $res['info'];

        //按条件给flag赋值，成为条件字段
        switch ($flag) {
            case 0://默认按标题查询
                $flag = 'title';
                break;
            case 2:
                $flag = 'title';
                break;
            case 3:
                $flag = 'sources';
                break;
            case 4:
                $flag = 'author';
                break;
        }

        if ($logMax == "" && $info == "") {
            //当查询条件最高日期且其他为空时，按>=$logMin值查询
            $map['time'] = array('egt', $logMin);
        } else if ($logMin == "" && $info == "") {
            //当查询条件最低日期且其他为空时，按<=$logMax值查询
            $map['time'] = array('elt', $logMax);
        } else if ($logMax == "" && $logMin == "") {
            //当查询条件日期为空时，按其他条件查询
            $map[$flag] = array('like', '%' . $info . '%');
        } else if ($info == "") {
            //当其他条件为空时，按日期范围搜索
            $map['time'] = array('between', array($logMin, $logMax));
        } else if ($logMax == "") {
            //当最高日期为空时，按>=$logMin 和title查询
            $map['time'] = array('egt', $logMin);
            $map[$flag] = array('like', '%' . $info . '%');
        } else if ($logMin == "") {
            //当最低日期为空时，按<=$logMax 和其他条件查询
            $map['time'] = array('elt', $logMax);
            $map[$flag] = array('like', '%' . $info . '%');
        } else {
            //当日期和其他条件都有时，按条件查询
            $map['time'] = array('between', array($logMin, $logMax));
            $map[$flag] = array('like', '%' . $info . '%');
        }

        //实例化NewModel
        $news = new NewsModel();
        //按条件获取表数据
        $res = $news->where($map)->paginate(10);
        //计数
        $count = $news->where($map)->count();
        //模板赋值
        $this->assign('news', $res);
        $this->assign('count', $count);
        return $this->fetch('article_list');

    }

//展示分类管理页
    public function showType(Request $request)
    {
////        语言
//        $lang=$request->param('lang');
        //分页标记，0显示分页；
        $status = 0;
        //获取在model处理过的分类列表

        $cateList = News_cate::getCate();
        //用模型获取分页数据
        $cate_list = News_cate::order('id', 'desc')->paginate(10);
        //上级分类名称
        foreach ($cate_list as $key => $value) {
            $pid = explode(',', $cate_list[$key]['cate_path']);
            $map['id'] = array('in', $pid);
            $p_name_cn = News_cate::where($map)->column('cate_name_cn');
            $p_name_cn = implode(',', $p_name_cn);
            $p_name_en = News_cate::where($map)->column('cate_name_en');
            $p_name_en = implode(',', $p_name_en);
            $cate_list[$key]['p_name'] = $p_name_cn . '(' . $p_name_en . ')';
            if ($cate_list[$key]['pid'] == 0) {
                $cate_list[$key]['p_name'] = "顶级分类";
            }
            $cate_list[$key]['cate_name'] = $value->cate_name_cn . '---' . $value->cate_name_en;
        }
        $page = $cate_list->render();
        //获取记录数量
        $count = News_cate::count();
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
            $pCate = News_cate::get($data['pid']);
            if ($pCate['pid'] == 0) {
                //父级的pid=0，cate_path为当前选择的父级ID
                $cate_path = $data['pid'];
            } else {
                //父级pid不为0，cate_path 为当前选择的父级id 加父级的cate_path
                $cate_path = $data['pid'] . ',' . $pCate['cate_path'];
            }
        }
        //新建数据
        $res = News_cate::create([
            'cate_name_cn' => $data['cate_name_cn'],
            'cate_name_en' => $data['cate_name_en'],
            'pid' => $data['pid'],
            'cate_path' => $cate_path,
        ]);
        //信息提示
        if (is_null($res)) {
            $this->error('添加失败', url('showType'));
        } else {
            $this->success('添加成功', url('showType'));
        }

    }

    //显示编辑页面
    public function editCategory(Request $request, $id)
    {
//        $lang=$request->param('lang');
        // 获取分类列表
        $cateList = News_cate::getCate();
        //根据前端传的id值查询
        $cate = News_cate::get($id);
        //搜索父级分类名
        $parent = News_cate::where('id', $cate['pid'])->value('cate_name_cn');
        $parent_en = News_cate::where('id', $cate['pid'])->value('cate_name_en');
        $parent = $parent . '-----' . $parent_en;
        //当前是几级分类
        if ($cate['cate_path'] == 0) {
            $countPath = "顶级分类";
        } else {
            //计算cate_path 个数
            $countPath = count(explode(',', $cate['cate_path']));
            $countPath = "第" . ($countPath + 1) . "级分类";
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
            $pCate = News_cate::get($data['pid']);
            if ($pCate['pid'] == 0) {
                //父级的pid=0，cate_path为当前选择的父级ID
                $cate_path = $data['pid'];
            } else {
                //父级pid不为0，cate_path 为当前选择的父级id 加父级的cate_path
                $cate_path = $data['pid'] . ',' . $pCate['cate_path'];
            }
        }
        $id = $data['id'];
        $cate = News_cate::get($id);
        $cate->cate_name_cn = $data['cate_name_cn'];
        $cate->cate_name_en = $data['cate_name_en'];
        $cate->pid = $data['pid'];
        $cate->cate_path = $cate_path;
        $res = $cate->save();
        if (is_null($res)) {
            $this->error('修改失败', url('product/showType'));
        } else {
            $this->success('修改成功', url('product/showType'));
        }


    }

    //删除分类
    public function deleteCategory()
    {
        $id = $_POST['id'];
        $map[] = ['exp', "FIND_IN_SET($id,cate_path)"];
        //删除分类下的产品
        $cate_id=News_cate::where($map)->column('id');
        array_push($cate_id,$id);
        $delNews=NewsModel::where(array('cate_id'=>array('in',$cate_id)))->delete();
        //删除以当前id在多有cate_path出现过的所有子分类
        $delPCate = News_cate::where($map)->delete();
//        //删除当前分类
        $delCate = News_cate::destroy($id);
        if ($delPCate && $delCate && $delNews) {//成功删除父分类及下面的子分类
            return 1;
        } else if ($delCate) {//成功删除单个没有下级的分类
            return 2;
        } else {
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
        $cate = News_cate::all();
        $cateList = News_cate::getCate();
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
        foreach ($check_id as $k) {
            $map[] = ['exp', "FIND_IN_SET($k,cate_path)"];
            News_cate::where($map)->delete();
        }

//        删除当前分类
        $delCate = News_cate::destroy($check_id);
        if ($delCate) {
            echo "删除成功";
        } else {
            echo "删除成功";
        }
    }


}
