<?php

namespace App\Http\Controllers;

use App\Config;
use App\Problem;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Detail;
use App\Course;
use App\Comment;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Controllers\Tool;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 课程主页
     */
    public function index()
    {
        $course_url = Input::get('course');
        $course_main = Course::getCourse($course_url);
        $wares = Detail::getCourseWareMenu($course_main['course']['id']);

        return view('course.index',['course_main'=>$course_main,'wares'=>$wares]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 课件页
     */
    public function show()
    {
        $type = Input::get('course');
        $ware = Input::get('ware');

        //如果课程不存在
        if(count(Course::where('url',$type)->get())==0){
            return Redirect::to('/404');
        }
        $course = Course::where('url',$type)->get()[0];
        //如果该课件不存在
        if (count(Detail::where(['course_id' => $course['id'], 'url' => $ware])->get()->toArray()) == 0) {
            return Redirect::to('/404');
        }

        $nav_lis = Detail::where('course_id',$course['id'])->get()->toArray();
        //如果某个课程一个课件也没有
        if(count($nav_lis)==0){
            return Redirect::to('/404');
        }

        $link_ware = ['pre_course'=>['title'=>'','url'=>''],'next_course'=>['title'=>'','url'=>'']];

        $detail = Detail::where(['course_id' => $course['id'], 'url' => $ware])->get()[0]->toArray();
        $this->addWareView($detail['id']);

        //详情页上一页和下一页信息
        $pre_id = Detail::where('id','<',$detail['id'])->where('course_id',$course['id'])->max('id');
        $next_id = Detail::where('id','>',$detail['id'])->where('course_id',$course['id'])->min('id');
        if($pre_id){
            $link_ware['pre_course'] = Detail::where('id',$pre_id)->get(['title','url'])->first();
        }
        if($next_id){
            $link_ware['next_course'] = Detail::where('id',$next_id)->get(['title','url'])->first();
        }

        //页面评论
        $comments = DB::select('select a.*,b.name from ischool_comments a left join ischool_users b on a.add_user_id=b.id 
        where a.ware_id=? and a.type=1 order by a.id desc',[$detail['id']]);

        //所有教程目录
        $courses = Course::all()->sortBy('sort');

        //打开课件时，添加学习状态
        if(Tool::isLogin()){
            Status::addLearnStatus($course['id'],$detail['id']);
        }

        return view('course.show',['courses'=>$courses,'course'=>$course,'nav_lis'=>$nav_lis,'detail'=>$detail,'link_ware'=>$link_ware,'comments'=>$comments]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 课程/课件评论页面
     */
    public function comment()
    {
        $course_url = Input::get('course');
        $ware_url = Input::get('ware');
        $page = Input::get('page')?intval(Input::get('page')):1;

        $course_main = Course::getCourse($course_url);

        $comments = Comment::getCourseComments($course_main['course']['id'],$page);
        $count = Comment::getCourseCommentsCount($course_main['course']['id']);
        return view('course.comment',['course_main'=>$course_main,'comments'=>$comments,'count'=>$count]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 课程/课件问答页面
     */
    public function problem()
    {
        $course_url = Input::get('course');
        $ware_url = Input::get('ware');
        $page = Input::get('page')?intval(Input::get('page')):1;

        $course_main = Course::getCourse($course_url);
        $problems = Problem::getCourseProblems($course_main['course']['id'],$page);
        $count = Problem::getCourseProblemsCount($course_main['course']['id']);

        return view('course.problem',['course_main'=>$course_main,'problems'=>$problems,'count'=>$count]);
    }

    public function note()
    {
        $course_url = Input::get('course');
        $ware_url = Input::get('ware');
        $course_main = Course::getCourse($course_url);

        return view('course.note',['course_main'=>$course_main]);
    }

    public function problemAnswer()
    {

    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $words = Input::get('top-search');
        $word = '%'.trim($words).'%';
        $rows = Detail::where('title','like',$word)->get()->toArray();
        foreach ($rows as $key=>$row){
            $rows[$key]['course'] = Course::where('id',$row['course_id'])->get(['url'])->first();
        }

        $courses = Course::all()->sortBy('sort');

        $log = Tool::get_user_name().'搜索了 '.$words;
        Tool::writeLog($log);

        return view('index.search',['courses'=>$courses,'words'=>$words,'wares'=>$rows]);
    }

    /**
     * @param $id
     */
    public function addWareView($id)
    {
        $id = intval($id);
        $view = Detail::where('id',$id)->first();
        $view2 = intval($view['view'])+1;
        DB::update('update ischool_details set view=? where id=?',[$view2,$id]);
    }

    public function learn(Request $request)
    {
        $data['course_id'] = $request->input('course_id');
        $data['ware_id'] = $request->input('ware_id');
        $data['user_id'] = Tool::get_user_id();

    }
}
