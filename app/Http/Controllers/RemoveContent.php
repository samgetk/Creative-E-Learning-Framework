<?php

namespace CEF\Http\Controllers;

use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\content\ContentRemover;
use CEF\Http\Controllers\content\ContentRemoverHelper;
use Illuminate\Http\Request;
use DB;

class RemoveContent extends Controller
{
    public function remove_content(Request $request)
    {
        $id = $request->session()->get('key');
        $project_name=ProjectInfo::set_name($id);
        $name=$request->id;
        $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        if($name=="home")
        {
            ContentRemover::home_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'home');
            return view('backend.project.project')
                ->with('content',$content)
                ->with('success','Home Design Successfully removed! Please Choose another!');
        }

        else if($name=="Account manager without administrator" || $name=="Account manager with administrator" )
        {
            ContentRemover::account_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'Account manager without administrator');
            ContentRemoverHelper::remove_content_record($id,'Account manager with administrator');
            return view('backend.account.account')
                ->with('content',$content)
                ->with('success','Account Manager Successfully removed!');
        }

        else if($name=="exam")
        {
            ContentRemover::exam_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'exam');
            return view('backend.content')
                ->with('content',$content)
                ->with('success','Exam Manager Successfully removed!');
        }

        else if($name=="Streaming")
        {
            ContentRemover::stream_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'Streaming');
            return view('backend.content')
                ->with('content',$content)
                ->with('success','Streaming Successfully removed!');
        }

        else if($name=="audio manager")
        {
            ContentRemover::stream_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'audio manager');
            return view('backend.content')
                ->with('content',$content)
                ->with('success','Audio Manager Successfully removed!');
        }

        else if($name=="video manager")
        {
            ContentRemover::video_remover($project_name);
            ContentRemover::stream_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'video manager');
            return view('backend.content')
                ->with('content',$content)
                ->with('success','Video Manager Successfully removed!');
        }

        else if($name=="resource manager")
        {
            ContentRemover::stream_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'resource manager');
            return view('backend.content')
                ->with('content',$content)
                ->with('success','Resource Manager Successfully removed!');
        }

        else if($name=="Document Uploader")
        {
            ContentRemover::stream_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'Document Uploader');
            return view('backend.content')
                ->with('content',$content)
                ->with('success','Document Uploader Successfully removed!');
        }

        else if($name=="uploader page")
        {
            ContentRemover::stream_remover($project_name);
            ContentRemoverHelper::remove_content_record($id,'uploader page');
            return view('backend.content')
                ->with('content',$content)
                ->with('success','Uploader page Successfully removed!');
        }
        return view('backend.content')
            ->with('content',$content)
            ->with('success','Resource Successfully removed!');
    }
}
