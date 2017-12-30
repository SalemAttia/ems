<?php

namespace App\Http\Controllers\feedback;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\feedback\question;
use App\feedback\Feedform;


class FeedManegmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index() {
        $Feedforms = Feedform::with('questions')->get();
        return view('feedback.index', ['Feedforms' => $Feedforms]);
    }

    public function create()
    {
      return view('feedback.create');
    }

    public function store(Request $request)
    {
      // return  count(array_filter($request->question["body"], 'strlen'));
      //dd($request->all());
      $datax = $this->validate($request, [
           'name' => 'required',
           'desc' => 'required',
           'question'   => 'required|array',
           'question.body.*'   => 'required'
        ]);
          // $data = new Feedform();
          $data['link'] = str_random(20); 
          $data['name'] = $request->name; 
          $data['desc'] = $request->desc; 
          $data['status'] = 1; 
          $data = Feedform::create($data);
          if($data){
               $formid = $data->id;
               $to = count(array_filter($request->question["body"], 'strlen'));

                for ($i = 0; $i < $to;$i++) {
                  $data = new question();
                  $data->feedform_id = $formid; 
                  $data->body = $request->question["body"][$i]; 
                  $data->type = $request->question["type"][$i]; 
                  $data->save();
                }
          }
           return redirect()->intended('/admin/feedback');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Feedforms = Feedform::with('questions')->find($id);
        
        // Redirect to state list if updating state wasn't existed
        if ($Feedforms == null || count($Feedforms) == 0) {
            return redirect()->intended('/admin/feedback');
        }

        $new = 'تعديل';
        return view('feedback/edit', ['Feedforms' => $Feedforms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Feedform = Feedform::findOrFail($id);
        $Feedform->link = str_random(8); 
        $Feedform->name = $request->name; 
        $Feedform->desc = $request->desc; 
        $Feedform->status = 1; 
        $form = $Feedform->save();
        question::where('feedform_id',$id)->delete();
          if($id){
               $to = count(array_filter($request->question["body"], 'strlen'));
               $formid = $id;
                for ($i = 0; $i < $to;$i++) {
                  $data = new question();
                  $data->feedform_id = $formid; 
                  $data->body = $request->question["body"][$i]; 
                  $data->type = $request->question["type"][$i]; 
                  $data->save();
                }
          }
        
        return redirect()->intended('/admin/feedback');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Feedform::where('id', $id)->delete();
         return redirect()->intended('/admin/feedback');
    }

    public function show($Feedform)
    {
      $formresponse = Feedform::where('id',$Feedform)->with('questions','response')->first();
      //first get all questions ids
      $questionradioids = array();
      $questiontextids = array();
      foreach ($formresponse->questions as $id) {
        if($id->type == 1){
         $questionradioids[] = $id->id;
        }else{
          $questiontextids[] = $id->id;
        }
      }
      //second check calculate the result by ids
      $questiontext = array();
      $questionradio = array();
      //a for ex, b for veryGood, c for good, d for weak ,f very weak 
       
      foreach ($formresponse->response as $value) {
        //add all response text in array
        foreach ($questiontextids as $text) {
           $questiontext[$text][] = $value->questionresponse[$text]['answer'];
        }
        //calculate result of radio buton
         
        foreach ($questionradioids as $radio) {
          $a =0;$b =0;$c =0;$d =0;$f =0;
          if($value->questionresponse[$radio]['answer'] == 'a'){
            $a++;
          }elseif($value->questionresponse[$radio]['answer'] == 'b'){
            $b++;
          }elseif($value->questionresponse[$radio]['answer'] == 'c'){
            $c++;
          }elseif($value->questionresponse[$radio]['answer'] == 'd'){
            $d++;
          }elseif($value->questionresponse[$radio]['answer'] == 'f'){
            $f++;
          }
          $questionradio[$radio]['id'][] = $radio;
          $questionradio[$radio]['a'][] = $a;
          $questionradio[$radio]['b'][] = $b;
          $questionradio[$radio]['c'][] = $c;
          $questionradio[$radio]['d'][] = $d;
          $questionradio[$radio]['f'][] = $f;
        }
          
      }
      $new = 'تعديل';
      $responsecount = count($formresponse->response);
        
        return view('feedback/show',['ab' => $questionradioids,'questionradio' => $questionradio,'questiontext' => $questiontext,'textids' => $questiontextids,'responsecount' => $responsecount]);
    }

    public function sendnotificationform($id)
    {
      $new = '';
      $form = Feedform::findOrFail($id);
      return view('feedback/sendform',['form' => $form,'new' => $new]);
    }
}
