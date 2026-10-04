<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Mail\ContactMail;
use App\Mail\VehicleBooking;
use App\Model\Booking;
use App\Model\Contact;
use App\Model\Inquiry;
use App\Model\Proposal;
use App\Model\TripBooking;
use App\Models\Settings\CountryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banners\BannerModel;
use App\Models\MultipleBanners\MultipleBannerModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\AssociatedPostModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostImageModel;
use App\Models\Posts\PostDocModel;
use App\Models\Settings\SettingModel;
use App\Models\Galleries\ImageGalleryModel;
use App\Models\Galleries\ImageGalleryCategoryModel;
use App\Models\Galleries\VideoGalleryModel;
use App\Mail\SendMail;
use App\Mail\SendMailContact;
use App\Mail\SendResume;
use App\Mail\CareerApply;
use App\Models\Posts\PostTypeModel;
use App\Models\Portfolios\PortfolioCategoryModel;
use App\Models\Portfolios\PortfolioModel;
use App\Models\Portfolios\AssociatedPortfolioModel;
use App\Models\RightShare\RightshareCompanyModel;
use App\Models\RightShare\RightshareEligibilityModel;
use App\Models\RightShare\RightshareHolderlistModel;
use App\Models\Taxliability\TaxliabilityCompanyModel;
use App\Models\Taxliability\TaxliabilityEligibilityModel;
use App\Models\Taxliability\TaxliabilityHolderlistModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class FrontpageController extends Controller
{

    public function index(Request $request)
    {
        $banner = BannerModel::where('status', 1)->first();
        $contact = PostTypeModel::where('id', '20')->first();
        $resource = PostTypeModel::where('id', 19)->first();
        $publications = getPosttypePostPostchildShowInHomeByIdWithStatus($resource->id);
        $about = PostTypeModel::where('id', 17)->first();
        $service = PostTypeModel::where('id', 16)->first();
        $services = PostModel::where('post_type', $service->id)->take(6)->get();
        $industry = PostTypeModel::where('id', 15)->first();
        $industries = PostModel::where('post_type', $industry->id)->take(9)->get();
        $nepal = PostTypeModel::where('id', 22)->first();
        $building = PostModel::where('post_type', $nepal->id)->take(3)->get();
        $career = PostModel::where('id', 110)->first();

        $resources = PostModel::where('post_type', 19)->where('post_parent', '!=', 0)->where('show_in_home', "1")->orderBy('home_order', 'asc')->take(4)->get();
        $footer = PostModel::where('post_category', 2)->get();
        //   $publication=PostModel::where('post_parent',94)->where('show_in_home',"1")->orderBy('home_order','asc')->take(3)->get();
        $news = PostModel::where('post_parent', 95)->where('show_in_home', "1")->orderBy('home_order', 'asc')->take(3)->get();
        $blog = PostModel::where('post_parent', 152)->where('show_in_home', "1")->orderBy('home_order', 'asc')->take(4)->get();

        // dd($industry,$industries);
        return view('themes.default.frontpage', compact('banner','contact','resource','publications','about','service','services','industry','industries','nepal','building','career'));
        // return view('themes.default.frontpage',compact('news','publication','banner','resource','service','career','industry','blog'));


    }

    public function posttype($uri)
    {
        if (!check_posttype_uri($uri)) {
            abort(404);
        }
        $data = PostTypeModel::where('uri', $uri)->first();
        $contact = PostTypeModel::where('id', '20')->first();
        $tmpl['template'] = 'page';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }
        if ($data) {
            $posts = PostModel::where('post_type', $data->id)
                ->where('status', 1)
                ->where('post_parent', 0)
                ->orderBy('post_order', 'asc')
                ->paginate(12);
        }
        $value = $uri;
        $industry = PostModel::where('status', 1)->where('post_type', 15)->get();
        $country = CountryModel::all();
        $branches = AssociatedPostModel::where('post_id', '161')->get();
        $documents = PostDocModel::where('post_id', $data['id'])->orderBy('ordering', 'desc')->get();

        $members = AssociatedPostModel::where('post_id', '106')->get();

        // dd($posts,$data);
        return view('themes.default.' . $data['template'] . '', compact('branches', 'data', 'documents', 'posts', 'country', 'industry', 'value','contact','members'));
    }

    // public function pagedetail($uri)
    public function pagedetail($parent, $uri)
    {
        if (!check_uri($uri)) {
            abort(404);
        }
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $tmpl['template'] = 'single';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }

        if ($data->id) {
            $data->visiter = $data->visiter + 1;
            $data->save();
        }
        $data_child = PostModel::where(['post_parent' => $data['id'], 'status' => '1'])->orderBy('post_order', 'asc')->paginate(12);
        $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->orderBy('ordering', 'asc')->paginate(12);
        $documents = PostDocModel::where('post_id', $data['id'])->orderBy('ordering', 'desc')->get();
        $pos_type = PostTypeModel::where('id', $data->post_type)->first();
        $related = PostModel::where('post_type', $pos_type->id)->where('id', '!=', $data->id)->where('post_parent', 0)->get();
        $contact = PostTypeModel::where('id', '20')->first();

        // dd($data,$associated_posts,$data_child);
        return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'associated_posts', 'documents', 'pos_type', 'related','contact'));
    }

    public function pagedetail_child($parenturi, $uri)
    {
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();

        $tmpl['template'] = 'single';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }

        if ($data->id) {
            $data->visiter = $data->visiter + 1;
            $data->save();
        }

        $data_child = PostModel::where('id', $data['post_parent'])->first();
        if ($data_child) {

            $data['template'] = $data_child['template_child'];
        }
        $associated_posts = array();
        if ($data) {
            $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->get();
        }
        $post_id = $data->id;
        $documents = PostDocModel::where('post_id', $data['id'])->orderBy('ordering', 'desc')->get();
        $related = PostModel::where('post_type', 16)->where('post_parent', '!=', 0)->get();
        $pos_type = PostTypeModel::where('id', $data->post_type)->first();
        return view('themes.default.' . $data['template'] . '', compact('related', 'data', 'data_child', 'associated_posts', 'documents', 'pos_type'));
    }

    public function portfolio($uri)
    {
        $data = PortfolioModel::where('uri', $uri)->first();
        $associated_post = AssociatedPortfolioModel::where('portfolio_id', $data['id'])->get();
        $trades = PortfolioModel::inRandomOrder()->limit(2)->get();
        if ($data) {
            return view('themes.default.trade', compact('data', 'associated_post', 'trades'));
        }
        return false;
    }

    public function servicetype($category_uri)
    {
        $category = PostCategoryModel::where('uri', $category_uri)->first();
        if ($category) {
            $data = PostModel::where('post_category', $category->id)->orderBy('post_order', 'desc')->get();
            return view('themes.default.service-list', compact('data', 'category'));
        }
        return false;
    }

    public function apply($parenturi, $uri)
    {
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        if ($data) {
            return view('themes.default.apply', compact('data'));
        }
    }

    public function navigation($uri)
    {
        $getId = PostModel::where(['uri' => $uri])->first();
        $childCount = PostModel::where(['post_parent' => $getId->id])->count();
        if ($childCount > 0) {
            $parent_post = PostModel::where('uri', $uri)->first();
            $post = PostModel::where(['post_parent' => intval($getId->id)])->orderBy('post_order', 'asc')->paginate(15);
            $template = $parent_post->template;
        } else {
            $parent_post = PostModel::where('uri', $uri)->first();
            $post = PostModel::where('uri', $uri)->first();
            $template = $post->template;
            $news_updates = PostModel::where(['post_type' => 9])->orderBy('post_order', 'asc')->paginate(15);
        }
        $bod = PostModel::where(['post_type' => 12])->get();
        return view('themes.default.' . $template . '', compact('post', 'bod', 'parent_post', 'news_updates'));
    }

    public function category_navigation($uri)
    {
        $post_category = PostCategoryModel::where('uri', trim($uri))->first();
        if ($post_category->id == 2) {
            $data =  PostModel::where(['post_category' => $post_category->id])->orderBy('post_order', 'asc')->paginate(15);
            return view('themes.default.completed', compact('data', 'post_category'));
        } else {
            $data =  PostModel::where(['post_category' => $post_category->id])->orderBy('post_order', 'asc')->paginate(15);
            return view('themes.default.ongoing', compact('data', 'post_category'));
        }
    }

    /***********************************
     ******** Root Navigation ***********
     ************************************/

    public function photo_gallery($cat_id)
    {
        $data = ImageGalleryModel::where(['category_id' => $cat_id])->get();
        $cat = ImageGalleryCategoryModel::where(['id' => $cat_id])->first();
        return view('themes.default.photo_gallery_thumbnail', compact('data', 'cat'));
    }

    public function sendmail()
    {
        $data = SettingModel::where('id', 1)->first();
        Mail::to($data->email_primary)->send(new SendMail());
        return redirect()->back()->with('message', 'Contact message successfully sent.');
    }

    public function sendmail_contact(Request $request)
    {
        $return = $this->getCaptcha($request['g_recaptcha_response']);
        $data = SettingModel::where('id', 1)->first();
        $data->num_of_inquiries = $data->num_of_inquiries + 1;
        $data->save();
        if ($return->success == true && $return->score > 0.5) {
            Mail::to($data->email_secondary)->send(new SendMailContact());
            return redirect()->back()->with('message', 'Contact message successfully sent.');
        } else {
            return redirect()->back()->with('message', 'Please, try again!');
        }
    }

    private function getCaptcha($Secretkey)
    {
        $secret = env('SECRET_KEY');
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => $secret,
                'response' => $Secretkey,
            ]
        );
        return $response->object();
    }

    public function career_navigation(Request $request)
    {
        $data['career_title'] = $request->input('post_title');
        return view('themes.default.apply', $data);
    }

    public function career_apply()
    {
        $data['career_title'] = request()->segment(3);
        return view('themes.default.apply', $data);
    }

    public function career_apply_action()
    {
        $data = SettingModel::where('id', 1)->first();
        Mail::to($data->email_primary)->send(new CareerApply());
        return redirect()->back()->with('message', 'Successfully Applied.');
    }

    public function postby_category($id)
    {
        $post_category = PostCategoryModel::where(['id' => $id])->first();
        $data = PostModel::where(['post_category' => $id])->paginate(20);
        if ($data) {
            return view('themes.default.postbycategory', compact('data', 'post_category'));
        }
        return false;
    }

    public function postby_parent($id)
    {
        $childCount = PostModel::where(['post_parent' => $id])->count();
        if ($childCount > 0) {
            $parent_post = PostModel::where('post_parent', $id)->first();
            $post = PostModel::where(['post_parent' => intval($id)])->orderBy('post_order', 'asc')->paginate(15);
            return view('themes.default.template-project-list', compact('post', 'parent_post'));
        }
        return false;
    }

    public function serviceorder($uri)
    {
        $data = PostModel::where('page_key', $uri)->first();
        if ($data) {
            $services = PostModel::where('post_category', $data->post_category)->get();
            $category = PostCategoryModel::where('id', $data->post_category)->first();
            return view('themes.default.order-form', compact('data', 'services', 'category'));
        }
        return false;
    }

    public function sendorder(Request $request)
    {
        $return = $this->getCaptcha($request['g-recaptcha-response']);
        $data = SettingModel::where('id', 1)->first();
        if ($return->success == true && $return->score > 0.5) {
            Mail::to($data->email_primary)->send(new SendMail());
            return redirect()->back()->with('message', 'Order sent successfully.');
        } else {
            return redirect()->back()->with('message', 'Please, try again!');
        }
    }

    public function careerapply($uri)
    {
        $data = PostModel::where('page_key', $uri)->first();
        if ($data) {
            $services = PostModel::where('post_category', $data->post_category)->get();
            $category = PostCategoryModel::where('id', $data->post_category)->first();
            return view('themes.default.career-form', compact('data', 'services', 'category'));
        }
        return false;
    }

    public function sendresume(Request $request)
    {
        $return = $this->getCaptcha($request['g-recaptcha-response']);
        $data = SettingModel::where('id', 1)->first();
        if ($return->success == true && $return->score > 0.5) {
            Mail::to($data->email_secondary)->send(new SendResume());
            return redirect()->back()->with('message', 'Resume sent successfully.');
        } else {
            return redirect()->back()->with('message', 'Please, try again!');
        }
    }

    public function rightshare(Request $request)
    {
        // $req = $request->all();
        $company = $request->company;
        $boid = $request->boid;
        $shn = $request->holder_number;
        if (!empty($company) && !empty($boid) && empty($shn)) {
            $data = RightshareEligibilityModel::where(['company' => $company, 'boid' => $boid])->get();
            $data2 = NULL;
            return view('themes.default.rightshare_result', compact('data', 'data2'));
        }
        if (!empty($company) && !empty($shn) && empty($boid)) {
            $data = NULL;
            $data2 = RightshareHolderlistModel::where(['company' => $company, 'shholderno' => $shn])->get();

            return view('themes.default.rightshare_result', compact('data2', 'data'));
        }
        if (!empty($company) && !empty($shn) && !empty($boid)) {
            return redirect()->back()->with('message', 'Input Value Doesnot Match');
        }
        if (empty($shn) && empty($boid)) {
            return redirect()->back()->with('error', 'Input Value Empty');
        }
    }

    public function taxliability(Request $request)
    {
        // $req = $request->all();
        $company = $request->company;
        $boid = $request->boid;
        $shn = $request->holder_number;
        if (!empty($company) && !empty($boid) && empty($shn)) {
            $data = TaxliabilityEligibilityModel::where(['company' => $company, 'boid' => $boid])->get();
            $data2 = NULL;
            return view('themes.default.taxliability_result', compact('data', 'data2'));
        }
        if (!empty($company) && !empty($shn) && empty($boid)) {
            $data = NULL;
            $data2 = TaxliabilityHolderlistModel::where(['company' => $company, 'shholderno' => $shn])->get();

            return view('themes.default.taxliability_result', compact('data2', 'data'));
        }
        if (!empty($company) && !empty($shn) && !empty($boid)) {
            return redirect()->back()->with('message', 'Input Value Doesnot Match');
        }
        if (empty($shn) && empty($boid)) {
            return redirect()->back()->with('error', 'Input Value Empty');
        }
    }

    public function post_inquiry(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'location' => 'required',
                'date' => 'required',
                'contact' => 'required'
            ]);
            $data = $request->all();
            $result = Inquiry::create($data);
            if ($result) {
                //              return new \App\Mail\Inquiry($request->email);
                //              Mail::send(new \App\Mail\Inquiry($request->email));
                return redirect()->back()->with('message', 'Inquiry message sent successfully.');
            }
        }
    }

    public function random_tripbooking(Request $request)
    {
        if ($request->isMethod('post')) {
            //          $request->validate([
            //              'first_name'=>'required',
            //              'last_name'=>'required',
            //              'email'=>'required',
            //              'phone'=>'required',
            //          ]);
            $data['first_name'] = $request->firstname;
            $data['last_name'] = $request->lastname;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['message'] = $request->message;
            $data['type'] = $request->uri;
            $create = TripBooking::create($data);
            if ($create) {
                //              return new \App\Mail\TripBooking($request->email);
                //              Mail::send(new \App\Mail\TripBooking($request->email));
                return back()->with('message', 'Trip Booking Completed');
            }
        }
    }


    public function vehicle_booking(Request $request)
    {
        if ($request->isMethod('post')) {
            $data['first_name'] = $request->firstname;
            $data['last_name'] = $request->lastname;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['message'] = $request->message;
            $data['type'] = $request->uri;
            $create = Booking::create($data);
            if ($create) {
                //             return new VehicleBooking($request->email);
                //             Mail::send(new VehicleBooking($request->email));
                return back()->with('message', 'Vehicle Booking Completed');
            }
        }
    }

    public function contact_form(Request $request)
    {
        // dd($request->all());

        $result = $this->getCaptcha($request['g_recaptcha_response']);

        if ($request->isMethod('post') && $result->success == true) {
            $request->validate([
                'fname'    => 'required|string',
                'lname'    => 'required|string',
                'email'    => 'required|email',
                'contact'  => 'required',
                'cname'    => 'nullable|string',
                'message'  => 'nullable|string',
            ], [
                'fname.required'   => 'First name is required.',
                'lname.required'   => 'Last name is required.',
                'email.required'   => 'Email address is required.',
                'email.email'      => 'Please enter a valid email address.',
                'contact.required' => 'Contact number is required.',
            ]);

            $contact = Contact::create([
                'first_name' => $request->fname,
                'last_name'  => $request->lname,
                'email'      => $request->email,
                'contact'    => $request->contact,
                'company'    => $request->cname,
                'comments'   => $request->message,
            ]);

            return new ContactMail($contact);
            // Mail::to('info@nbsm.com.np')->send(new ContactMail($contact));

            return back()->with([
                'success' => true,
                'message' => 'Contact form submitted successfully'
            ]);
        } else {
            return back()->withInput()->with([
                'error' => true,
                'message' => 'You are robot. Try Again.'
            ]);
        }
    }

    public function proposal_request(Request $request)
    {

        if ($request->isMethod('get')) {
            $value = $request->uri;
            $data = PostTypeModel::where('id', '21')->first();
            $industry = PostModel::where('status', 1)->where('post_type', 15)->get();
            $country = CountryModel::all();

            return view('themes.default.posttypeTemplate-proposal', compact('data', 'industry', 'country', 'value'));
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'rfp' => 'required'
            ]);

            $data['rfp'] = $request->rfp;
            $value = SettingModel::where('id', 1)->first();
            Mail::to($value->email_secondary)->send(new SendMail($data));
            return redirect()->back()->with('message', 'Thank you so much for submitting the RFP. Our Partners will get in touch with you very soon. Or Pls send your RFP at info@nbsm.com.np');
        }
    }
}
