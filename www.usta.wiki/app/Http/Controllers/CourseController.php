<?php

namespace App\Http\Controllers;

use App\Config;
use App\Note;
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
        $c_page = Input::get('cpage')?intval(Input::get('cpage')):1;
        $comments = Comment::getWareComments($detail['id'],$c_page);
        $c_count = Comment::getWareCommentsCount($detail['id']);

        //页面问答
        $p_page = Input::get('ppage')?intval(Input::get('ppage')):1;
        $problems = Problem::getWareProblems($detail['id'],$p_page);
        $p_count = Problem::getWareProblemsCount($detail['id']);

        $n_page = Input::get('npage')?intval(Input::get('npage')):1;
        $notes = Note::getWareNotes($detail['id'],$n_page);
        $n_count = Note::getWareNotesCount($detail['id']);

        //打开课件时，添加学习状态
        if(Tool::isLogin()){
            Status::addLearnStatus($course['id'],$detail['id']);
        }

        return view('course.show',['course'=>$course,'detail'=>$detail,'nav_lis'=>$nav_lis,'link_ware'=>$link_ware,'comments'=>$comments,'c_count'=>$c_count,'problems'=>$problems,'p_count'=>$p_count,'notes'=>$notes,'n_count'=>$n_count]);
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
        return view('course.comment',['course_main'=>$course_main,'comments'=>$comments,'c_count'=>$count]);
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

        $page = Input::get('page')?intval(Input::get('page')):1;

        $notes = Note::getCourseNotes($course_main['course']['id'],$page);
        $count = Note::getCourseNotesCount($course_main['course']['id']);

        return view('course.note',['course_main'=>$course_main,'notes'=>$notes,'count'=>$count]);
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
        $rows = Detail::where('title','like',$word)->where('is_delete',0)->get()->toArray();
        foreach ($rows as $key=>$row){
            $rows[$key]['course'] = Course::where('id',$row['course_id'])->get(['url'])->first();
        }

        $log = Tool::get_user_name().'搜索了 '.$words;
        Tool::writeLog($log);

        return view('index.search',['words'=>$words,'wares'=>$rows]);
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
