<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(){
        $books= Book::all();
        if ($books->count()>0){
            return response()->json($data =[
                'status'=>200,
                'books'=>$books
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>"No Records Found"
            ],404); 
        }

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title'=> 'required|string|max:191',
            'author'=>'required|string|max:191',
            'description'=>'required|string|max:1000',
            'price'=>'required|integer|max:191',
            'img'=>'required|string|max:191',
        ]);
        if ($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->messages()],422);
            
        }else{
            $book=Book::create([
                'title'=>$request->title,
                'author'=>$request->author,
                'description'=>$request->description,
                'price'=>$request->price,
                'img'=>$request->img,
            ]);
            if ($book){
                return response()->json([
                    'status'=>200,
                    'message'=>"Book Created Successfully"
                ],200);

            }else{
                return response()->json([
                    'status'=>500,
                    'message'=>"Something Went Wrong"
                ],500);
            }
        }

    }
    public function show($id){
        $book=Book::find($id);
        if($book){
            return response()->json([
                'status'=>200,
                'book'=>$book
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>"No Book Found"
            ],500);
        }

    }
    public function edit($id){
        $book=Book::find($id);
        if($book){
            return response()->json([
                'status'=>200,
                'book'=>$book
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>"No Book Found"
            ],500);
        }

    }
    public function update(Request $request,int $id){
        $validator = Validator::make($request->all(),[
            'title'=> 'required|string|max:191',
            'author'=>'required|string|max:191',
            'description'=>'required|string|max:1000',
            'price'=>'required|integer|max:191',
            'img'=>'required|string|max:191',
        ]);
        if ($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->messages()],422);
            
        }else{
            $book=Book::find($id);


            if ($book){
                $book->update([
                    'title'=>$request->title,
                    'author'=>$request->author,
                    'description'=>$request->description,
                    'price'=>$request->price,
                    'img'=>$request->img,
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=>"Book Updated Successfully"
                ],200);
            
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>"Something Went Wrong"
                ],404);
            }
        }
    }
    public function destroy($id){
        $book=Book::find($id);
        if($book){
            $book->delete();
            return response()->json([
                'status'=>200,
                'message'=>"Book Deleted Successfully"
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>"No Book Found"
            ],404);
        }

    }
}
