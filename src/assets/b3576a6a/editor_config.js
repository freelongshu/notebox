/**
 *  ueditor完整配置项
 *  可以在这里配置整个编辑器的特性
 */

/**************************提示********************************
 * 所有被注释的配置项的默认值就是注释项后边给的值或者是有提示默认值是多少，如果你想改，就去掉注释，修改默认值，或者在实例化编辑器时传入相应的值，就会覆盖默认的配置值
 * 每次升级编辑器时，可以直接用你改的editor_config.js直接覆盖新版本的editor_config.js,而不用担心会出现错误提示
 **************************提示********************************/


(function () {
    /**
     * 编辑器资源文件根路径。它所表示的含义是：以编辑器实例化页面为当前路径，指向编辑器资源文件（即dialog等文件夹）的路径。
     * 鉴于很多同学在使用编辑器的时候出现的种种路径问题，此处强烈建议大家使用"相对于网站根目录的相对路径"进行配置。
     * "相对于网站根目录的相对路径"也就是以斜杠开头的形如"/myProject/ueditor/"这样的路径。
     * 如果站点中有多个不在同一层级的页面需要实例化编辑器，且引用了同一UEditor的时候，此处的URL可能不适用于每个页面的编辑器。
     * 因此，UEditor提供了针对不同页面的编辑器可单独配置的根路径，具体来说，在需要实例化编辑器的页面最顶部写上如下代码即可。当然，需要令此处的URL等于对应的配置。
     * window.UEDITOR_HOME_URL = "/xxxx/xxxx/";
     */
    var URL;

    /**
     * 此处配置写法适用于UEditor小组成员开发使用，外部部署用户请按照上述说明方式配置即可，建议保留下面两行，以兼容可在具体每个页面配置window.UEDITOR_HOME_URL的功能。
     */
    var tmp = window.location.pathname;
        URL = window.UEDITOR_HOME_URL||tmp.substr(0,tmp.lastIndexOf("\/")+1).replace("_examples/","").replace("website/","");//这里你可以配置成ueditor目录在您网站的相对路径或者绝对路径（指以http开头的绝对路径）

    /**
     * 配置项主体。注意，此处所有涉及到路径的配置别遗漏URL变量。
     */
    window.UEDITOR_CONFIG = {

        //为编辑器实例添加一个路径，这个不能被注释
        UEDITOR_HOME_URL : URL

        //工具栏上的所有的功能按钮和下拉框，可以在new编辑器的实例时选择自己需要的从新定义
        ,toolbars:[
            ['source','Bold', 'Italic', 'StrikeThrough', 'FontSize','forecolor' ,'JustifyLeft', 'JustifyCenter', 'JustifyRight',  'InsertOrderedList', 'InsertUnorderedList','Horizontal','klink','kimage','kvideo']
        ]
        //当鼠标放在工具栏上时显示的tooltip提示
        ,labelMap:{
            'bold':'加粗','italic':'斜体','underline':'下划线','strikethrough':'删除线','fontsize':'字体大小','justifyleft':'居左对齐','justifycenter':'居中对齐','justifyright':'居右对齐','justifyjustify':'两端对齐','link':'插入链接','unlink':'取消链接','insertorderedlist':'插入有序列表','insertunorderedlist':'插入无序列表',
            'kimage':'图片'
        }

        //常用配置项目
        //,isShow : true    //默认显示编辑器

        ,initialContent:''    //初始化编辑器的内容,也可以通过textarea/script给值，看官网例子

        //,autoClearinitialContent:false //是否自动清除编辑器初始内容，注意：如果focus属性设置为true,这个也为真，那么编辑器一上来就会触发导致初始化的内容看不到了

        ,iframeCssUrl: URL + '/themes/default/iframe.css' //给编辑器内部引入一个css文件

        //,textarea:'editorValue' // 提交表单时，服务器获取编辑器提交内容的所用的参数，多实例时可以给容器name属性，会将name给定的值最为每个实例的键值，不用每次实例化的时候都设置这个值

        //,focus:true //初始化时，是否让编辑器获得焦点true或false

        //,minFrameHeight:320  // 最小高度,默认320

        //,autoClearEmptyNode : true //getContent时，是否删除空的inlineElement节点（包括嵌套的情况）

        //,fullscreen : false //编辑器初始化结束后,编辑区域是否是只读的，默认是false

        //,readonly : false //编辑器层级的基数,默认是999

        //,zIndex : 999 //图片操作的浮层开关，默认打开

        //,imagePopup:true

        //,initialStyle:'body{font-size:18px}'   //编辑器内部样式,可以用来改变字体等

        //,emotionLocalization:false //是否开启表情本地化，默认关闭。若要开启请确保emotion文件夹下包含官网提供的images表情文件夹

        //,enterTag:'p' //编辑器回车标签。p或br

        //,pasteplain:false  //是否纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴

        //iframeUrlMap
        //dialog内容的路径 ～会被替换成URL,垓属性一旦打开，将覆盖所有的dialog的默认路径
        //,iframeUrlMap:{
        // 'anchor':'~/dialogs/anchor/anchor.html',
        // }

        //tab
        //点击tab键时移动的距离,tabSize倍数，tabNode什么字符做为单位
        //,tabSize:4
        //,tabNode:'&nbsp;'

        //insertorderedlist
        //有序列表的下拉配置
        //,insertorderedlist : {
//             'decimal' : '' ,         //'1,2,3...'
//             'lower-alpha' : '' ,    // 'a,b,c...'
//             'lower-roman' : '' ,    //'i,ii,iii...'
//             'upper-alpha' : '' ,    //'A,B,C'
//             'upper-roman' : ''      //'I,II,III...'        
        // }
        
        //insertunorderedlist
        //无序列表的下拉配置
        //,insertunorderedlist : {
        //    'circle' : '',  // '○ 小圆圈'
        //    'disc' : '',    // '● 小圆点'
        //    'square' : ''   //'■ 小方块'
        //}
        
        //fontsize
        //字号
        ,'fontsize':[10, 11, 12, 14, 16, 18, 20, 24]
        ,elementPathEnabled : false
        ,wordCount:false
        // autotypeset
        //自动排版参数
				// ,autotypeset:{
				// 	mergeEmptyline : true,         //合并空行
				// 	removeClass : true,           //去掉冗余的class
				// 	removeEmptyline : false,      //去掉空行
				// 	textAlign : "left" ,           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
				// 	imageBlockLine : 'center',      //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
				// 	pasteFilter : true,            //根据规则过滤没事粘贴进来的内容
				// 	clearFontSize : true,          //去掉所有的内嵌字号，使用编辑器默认的字号
				// 	clearFontFamily : true,        //去掉所有的内嵌字体，使用编辑器默认的字体
				// 	removeEmptyNode : false ,       // 去掉空节点
				// 	//可以去掉的标签
				// 	removeTagNames : {标签名字:1},
				// 	indent : false,                 // 行首缩进
				// 	indentValue : '2em'             //行首缩进的大小
				// }
				// ,autoHeightEnabled:false
    };
})();
