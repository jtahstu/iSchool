<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Detail;
use App\Course;
use App\Comment;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Controllers\Tool;

class CourseController extends Controller
{
    public function show()
    {
        $type = Input::get('course');
        $ware = Input::get('ware');

        $course = Course::where('url',$type)->get()[0];
        $nav_lis = Detail::where('course_id',$course['id'])->get()->toArray();

        $link_ware = ['pre_course'=>['title'=>'','url'=>''],'next_course'=>['title'=>'','url'=>'']];

        if($ware){
            $detail = Detail::where(['course_id'=>$course['id'],'url'=>$ware])->get()[0]->toArray();
            $this->addWareView($detail['id']);
        }else{
            $detail = Detail::where(['course_id'=>$course['id']])->get()[0]->toArray();
        }

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
        where a.ref_id=? and a.type=1 order by a.id desc',[$detail['id']]);

        return view('course.show',['course'=>$course,'nav_lis'=>$nav_lis,'detail'=>$detail,'link_ware'=>$link_ware,'comments'=>$comments]);
    }

    public function search()
    {
        $words = Input::get('top-search');
        $word = '%'.trim($words).'%';
        $rows = Detail::where('title','like',$word)->get()->toArray();
        foreach ($rows as $key=>$row){
            $rows[$key]['course'] = Course::where('id',$row['course_id'])->get(['url'])->first();
        }

        $courses = Course::all()->sortBy('sort');
        return view('index.search',['courses'=>$courses,'words'=>$words,'wares'=>$rows]);
    }

    public function addWareView($id)
    {
        $id = intval($id);
        $view = Detail::where('id',$id)->first();
        $view2 = intval($view['view'])+1;
        DB::update('update ischool_details set view=? where id=?',[$view2,$id]);


    }
}
