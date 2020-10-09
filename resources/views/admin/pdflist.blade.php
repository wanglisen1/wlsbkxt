<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .pdfobject-container { height: 800px;}
        .pdfobject { border: 1px solid #666; }
    </style>
</head>
<body oncontextmenu="return false" onkeypress="return false" onkeydown="return false"
      onkeyup="return false" onselectstart="return false" ondragstart="return false"
      onbeforecopy="return
false">


<div id="example1" ></div>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script type="text/javascript" src="/package/pdfobject.min.js"></script>
<script>
    var options = {

        height: "400px",

        pdfOpenParams: {
            scrollbars: '0',
            toolbar: '0',
            statusbar: '0',
            pagemode: "thumbs",
            view: 'FitV'
        }              //禁用工具栏代码

    };


    PDFObject.embed("/pdftest.pdf", "#example1" ,options);


</script>
</body>
</html>
　　