@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/login.css')}}">

@endsection
@section('content')
<div class="login-form register">

            <form action="/signup/submit" method="post">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">{{App::getLocale() == 'ar' ? "الاسم الاول" : "first name"}}</label>
                            <input type="text" class="form-control" id="first_name"  name="first_name" placeholder="{{App::getLocale() == 'ar' ? 'الاسم الاول' : 'first name'}}">
                                                                @if ($errors->has('first_name'))
                <span style="color:red;">{{ $errors->first('first_name') }}</span>
                @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">{{App::getLocale() == 'ar' ? "الاسم الاخير " : "last name"}}</label>
                            <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="{{App::getLocale() == 'ar' ? 'ادخل الاخير ' : 'last name'}}">
                                                                                            @if ($errors->has('last_name'))
                <span style="color:red;">{{ $errors->first('last_name') }}</span>
                @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">{{App::getLocale() == 'ar' ? " البريد الإلكترونى  " : "Email"}}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{App::getLocale() == 'ar' ? '   البريد الإلكترونى  ' : 'Your Email  '}}">
                            
                                            @if ($errors->has('email'))
                <span style="color:red;">{{ $errors->first('email') }}</span>
                @endif
                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">{{App::getLocale() == 'ar' ? 'رقم الهاتف (اختياري)' : 'Phone (optional)'}}</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="{{App::getLocale() == 'ar' ? ' رقم الهاتف ' : 'Phone Number   '}} ">
                                                                        @if ($errors->has('phone'))
                <span style="color:red;">{{ $errors->first('phone') }}</span>
                @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">{{App::getLocale() == 'ar' ? '  كلمة المرور' : ' Password'}}</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="{{App::getLocale() == 'ar' ? '   كلمة المرور ' : 'Password '}}">
                                                                                                    @if ($errors->has('password'))
                <span style="color:red;">{{ $errors->first('password') }}</span>
                @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">{{App::getLocale() == 'ar' ? ' تاكيد  كلمة المرور' : ' Password confirmation'}}</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{App::getLocale() == 'ar' ? '  تاكيد  كلمة المرور  ' : 'Password confirmation '}}">
                                                                                                    @if ($errors->has('password_confirmation'))
                <span style="color:red;">{{ $errors->first('password_confirmation') }}</span>
                @endif
                        </div>
                    </div>
                </div>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="terms" value=true style="
    position: absolute;
    top: 6px;
">
                <label class="form-check-label" for="exampleCheck1" style="{{ App::getLocale() == 'ar' ?  'margin-right: 20px;' : '' }}" >{{App::getLocale() == 'ar' ? '  اوافق علي  ' : 'I accept the '}}
                 <a   data-toggle="modal" data-target="#myModal"  style="color: #61bfd0;">{{App::getLocale() == 'ar' ? ' الشروط والأحكام ' : 'Privacy policy
'}}</a>
                                                                        @if ($errors->has('terms'))
              <p style="
    color: #ff0000c9;
    text-align: left;
    margin-top: 5px;
    margin-bottom: 0px;
    font-size: medium;
">    {{  App::getLocale() == 'ar' ? '   يجب الموافقة علي الشروط والأحكام  ' : 'Privacy policy
'}}</p>
                @endif
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">{{App::getLocale() == 'ar' ? '  سياسة الخصوصية ' : 'Privacy policy
'}}</h4>
        <button type="button" style="
    margin-left: 0px;
" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
     تنطبق هذه الشروط والأحكام على استخدامك للموقع الإلكتروني الموجود على www.towipi.com
 باستخدام موقع towipi فأنت توافق على الالتزام بهذه الشروط والأحكام. وفي حال عدم موافقتك على الشروط والأحكام يتعين عليك عدم استخدام الموقع.
 نحتفظ بحقنا بتغيير الشروط والأحكام من وقت لآخر وعليه يتعين عليك الاطلاع على هذه الشروط والأحكام دوريا. ولا يتوجب علينا الاتصال بك أو إعلامك بأي تغييرات تم إجراؤها على الشروط والأحكام. ويعتبر استمرار استخدامك لموقع towipi بمثابة موافقة على الشروط والأحكام المطبقة في وقت استخدامك للموقع.

إستخدامك Towipi  يعنى أنك قد وافقت على :

1- أن تكون مسؤولاً عن المحافظة على سرية معلومات حسابك وكلمة المرور السرية لن يكون Towipi بأي حال من الأحوال مسؤولاً عن أي خسارة قد تلحق بك بشكل مباشر أو غير مباشر معنويا أو ماديا نتيجة كشف معلومات إسم المستخدم أو كلمة الدخول.

2- أنت موافق على الإفصاح بمعلومات حقيقية وصحيحة و محدثة و كاملة عن نفسك حسبما هو مطلوب في استمارة التسجيل لدى Towipi

3- يسمح بانشاء حساب على Towipi لمن تتجاوز أعمارهم 18 عام . ولموقع Towipi الحق فى إلغاء عضوية أى مشترك لم يتجاوز عمرة 18 عام.

4- لا يحق لأي شخص إستخدام الموقع إذا ألغيت عضويته من Towipi

5- أنت موافق على أن يتم التواصل معك عبر البريد الإلكتروني

6- سياسة الإسترجاع :-

- أنشق او فى ظروف غير مقبولة 
- غير مستخدم و مع الأغلفة الأصلية الخاصة به
- لا نقدم خدمة استرجاع الأموال الخاصة بالتوصيل 
- نقبل المرتجعات المطابقة للشروط أعلاة فقط خلال 14 يوم من تاريخ الشراء
- يجب أن تكون العبوة فى حالتها الأصلية حتى نتمكن من إعادتها بالشروط أعلاه
- لا يوجد تبديل أو رد للأموال فى حالة الطلب المخصص وأدوات تزيين الكيك المستخدمة أو التى عبوتها مفتوحة أو تالفة   
لا نتحمل أي مسؤولية عن المعاملات الغير صحيحة بسبب إدخال بيانات غير دقيقة أثناء استخدام خدمات الدفع عبر الإنترنت أو فقدان البيانات أو المعلومات التي تسببها عوامل خارجة عن سيطرتنا.
أو إدخال اسم الطفل وسنة خطأ فى حالة تخصيص طلبك.

7- سياسة الخصوصية :

ماذا سنفعل بالمعلومات المعطاه إلينا :
نطلب هذه المعلومات لفهم احتياجاتك وتقديم خدمة أفضل لك ، وعلى وجه الخصوص للأسباب التالية:
قد نستخدم المعلومات لتحسين منتجاتنا وخدماتنا.
قد نرسل لك بشكل دوري رسائل بريد إلكتروني ترويجية حول المنتجات الجديدة أو العروض الخاصة أو المعلومات الأخرى التي نعتقد أنك قد تجدها مثيرة للاهتمام باستخدام عنوان البريد الإلكتروني الذي قدمته.
من وقت لآخر ، قد نستخدم معلوماتك أيضًا للاتصال بك لأغراض أبحاث السوق. قد نتواصل معك عبر البريد الإلكتروني أو الهاتف. قد نستخدم المعلومات لتخصيص الموقع وفقًا لاهتماماتك.
الأمان
نحن ملتزمون بضمان أن تكون معلوماتك آمنة. من أجل منع الوصول أو الكشف غير المصرح به ، قمنا بوضع إجراءات مادية وإلكترونية وإدارية مناسبة لحماية وتأمين المعلومات التي نجمعها عبر الإنترنت.

روابط المواقع الأخرى:
قد يحتوي موقعنا على روابط لمواقع أخرى ذات أهمية. ومع ذلك ، بمجرد استخدامك لهذه الروابط لمغادرة موقعنا ، يجب أن تلاحظ أنه ليس لدينا أي سيطرة على هذا الموقع الآخر. لذلك ، لا يمكننا أن نكون مسؤولين عن حماية خصوصية أي معلومات تقدمها أثناء زيارتك لهذه المواقع ، ولا تخضع هذه المواقع لبيان الخصوصية هذا. يجب عليك توخي الحذر وإلقاء نظرة على بيان الخصوصية المطبق على موقع الويب المعني.

لا يسمح باستخدام موقعنا لمن هم أقل من 18 عام

إن كان لديك أى سؤال لا تترد فالتواصل معنا عبر صفحتنا على فيس بوك او الشات على موقعنا
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{App::getLocale() == 'ar' ? ' اغلاق  ' : 'Close'}}</button>
      </div>
    </div>
  </div>
</div>
                 
                 </label>
                </div>
                <button type="submit" class="btn btn-block ">{{App::getLocale() == 'ar' ? '  انشاء الحساب  ' : 'Create Account'}}</button>
            </form>
        </div>
    </div>


    
@endsection