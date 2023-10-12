<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewProduct(Request $request,$id){
        $this->validate($request,[
            'summery' => 'required',
            'review' => 'required',
        ]);
        Review::insert([
            'product_id' => $id,
            'user_id' => Auth::id(),
            'summery' => $request->summery,
            'review' => $request->review,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Review will Approved by Admin'
        );
        return redirect()->back()->with($notification);

    }
    public function PendingReview(){
        $reviews = Review::where('status',false)->latest()->get();
        return view('admin.review.pending_review',compact('reviews'));

    }

    public function ApproveReview($id){
        Review::where('id',$id)->update([
            'status' => true
        ]);

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Review Approve Successfully'
        );
        return redirect()->route('approve.review.show')->with($notification);

    }

    public function ApproveReviewShow(){
        $reviews = Review::where('status',true)->latest()->get();
        return view('admin.review.approve_review',compact('reviews'));
    }

    public function DeleteReview($id){
        $delete_review = Review::find($id);
        $delete_review->delete();

        $notification = array(
            'alert_type' => 'warning',
            'message' => 'Review Deleted Successfully'
        );
        return redirect()->back()->with($notification);
    }








}
