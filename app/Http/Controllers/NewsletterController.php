<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
  protected $subscriber_data;

  public function subscribe(Request $request)
  {
    $this->subscriber_data['is_new_subscriber'] = false;

    if (! Newsletter::isSubscribed($request->subscriber_email)) {
      Newsletter::subscribe($request->subscriber_email);
      $this->subscriber_data['is_new_subscriber'] = true;
    } else {
      $this->subscriber_data['is_new_subscriber'] = false;
    }

    return response()->json($this->subscriber_data);
  }
}
