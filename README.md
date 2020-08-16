## Overview 

### 1. Main Functions

#### 1.1 Background 

-	Dairy end user management, milk station management, basic information management, order management, financial management, production management, milk card management, bottle frame management, customer management, evaluation management, statistical analysis
-	Milk station User management, order management, basic information management, production and distribution management, customer management, bottle frame management, financial management, statistical analysis
-	Total platform system log, user management, financial management, customer management, statistical analysis

#### 1.2 WeChat

-	Order management, order review, order modification, evaluation

### 2. Technical content
#### 2.1 Front-end development (Bootstrap framework v3.3.5) Based on [INSPINIA template](http://www.snschina.com/archives/2484) to do background page design

-	jQuery Pagination Plugin
-	Switchery switch button plugin (https://github.com/abpetkov/switchery)
-	jQuery confirm plugin v2.3.1 (https://github.com/craftpip/jquery-confirm)
-	jQuery iCheck Plugin (https://github.com/frontend/iCheck)
-	jQuery Select2 plugin (https://github.com/select2/select2)
-	jQuery chosen selection box plugin (https://github.com/harvesthq/chosen)
-	Self made upload picture preview jQuery plugin public/js/plugins/simpleimguploadpublic/js/plugins/imgupload
-	HTML5 Webcam Plugin (https://github.com/jhuckaby/webcamjs)
-	Customize Bootstrap calendar to enter weekly and monthly delivery quantities
-	jQuery tags input plugin (https://github.com/bootstrap-tagsinput/bootstrap-tagsinput)
-	UEditor (https://github.com/fex-team/ueditor)
-	jQuery multiselect plugin (https://github.com/crlcu/multiselect)
-	jQuery star-rating plugin (https://github.com/kartik-v/bootstrap-star-rating)
-	jQuery notify plugin (https://github.com/jpillora/notifyjs)
-	jQuery metisMenu plugin (https://github.com/onokumus/metisMenu)
-	jQuery pace page loading progress bar plugin (https://github.com/HubSpot/pace)

#### 2.2 Later development (Laravel framework v5.2.45) 

-	Using relational database, the data table structure is in [database directory] (database) 
-	Laravel Excel add-in (https://github.com/Maatwebsite/Laravel-Excel)
-	WeChat Pay PHP plugin 
-	Realize SMS verification through [Emacs] (http://www.emay.cn/) SMS service

## Need to improve 
-	Improve the speed of loading area lists 
-	WeChat public account and payment adopt Laravel plug-in 
-	Remove redundant appends attributes from the model and replace them with get functions to improve performace 
-	The small screen interface layout is ugly 
-	Wechat interface 
-	Data display requires paging query 
-	~~ Clean up all garbage codes ~~

