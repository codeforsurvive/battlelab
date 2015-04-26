<?php

/**
 * Description of TextEditor
 *
 * @author Rohmad
 */
class TextEditor
{

    public static function generateTextEditor($id, $value = '')
    {
        static::init();
        echo '<textarea id="' . $id . '" name="' . $id . '" cols="45" rows="15">' . $value . '</textarea>';
        //static::callback($id);
    }

    private static function init()
    {
        echo
        '<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,

        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",

        // Style formats
        style_formats : [
            {title : \'Bold text\', inline : \'b\'},
            {title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
            {title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
            {title : \'Example 1\', inline : \'span\', classes : \'example1\'},
            {title : \'Example 2\', inline : \'span\', classes : \'example2\'},
            {title : \'Table styles\'},
            {title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
        ],

        // Replace values for the template plugin
        template_replace_values : {
            username : "Rohmad",
            staffid : "5109100112"
        }
    });
</script>';
    }

    private static function callback($id)
    {
        echo '
<a href="javascript:;" onclick="tinyMCE.get(\'' . $id . '\').show();return false;">[Show]</a>
<a href="javascript:;" onclick="tinyMCE.get(\'' . $id . '\').hide();return false;">[Hide]</a>
<a href="javascript:;" onclick="tinyMCE.get(\'' . $id . '\').execCommand(\'Bold\');return false;">[Bold]</a>

<a href="javascript:;" onclick="alert(tinyMCE.get(\'' . $id . '\').getContent());return false;">[Get contents]</a>
<a href="javascript:;" onclick="alert(tinyMCE.get(\'' . $id . '\').selection.getContent());return false;">[Get selected HTML]</a>
<a href="javascript:;" onclick="alert(tinyMCE.get(\'' . $id . '\').selection.getContent({format : \'text\'}));return false;">[Get selected text]</a>
<a href="javascript:;" onclick="alert(tinyMCE.get(\'' . $id . '\').selection.getNode().nodeName);return false;">[Get selected element]</a>
<a href="javascript:;" onclick="tinyMCE.execCommand(\'mceInsertContent\',false,\'<b>Hello world!!</b>\');return false;">[Insert HTML]</a>
<a href="javascript:;" onclick="tinyMCE.execCommand(\'mceReplaceContent\',false,\'<b>{$selection}</b>\');return false;">[Replace selection]</a>
';
    }

}

?>
