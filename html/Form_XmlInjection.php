<html>
    <head>
        <head>
            <meta http-equiv='content-type' , content='text/xml'; charset='UTF-8'>
        </head>
        <title>input command</title>
    </head>
    <body>    

    <button id="btn">送出</button><br />

    <form action="XmlInjection.php" method="POST">
        Xml: <textarea name="xml" id="" cols="50" rows="10"><?xml version="1.0" encoding="utf-8"?><root><name>Jason</name><year>20</year></root></textarea>
    
        <input type="submit" value="ssubmit">

    </form>

    <p id="demo">Data here.</p>

<script type="text/javascript">
    let btn = document.querySelector('#btn');
    btn.addEventListener('click',submit);
    var xhr;
    function submit() { 
        xhr = new XMLHttpRequest();

        xhr.open('post','XmlInjection.php',true);
            
        // 不同於 get，post 在傳送前要先設定傳送資料的格式，我要傳過去的是 JSON 格式
        xhr.setRequestHeader('Content-Type', 'text/xml');

        let num = { // 假設 data 實際上是由使用者提供
        x : 10,
        y : 20,
        z : 30
        };
        const data = toXML(num);
            
        // 接著傳送過去
        var data2 = "<?xml version='1.0'?><query><author>John Steinbeck</author></query>";
        // xhr.send(data2);
        xhr.send(data);
            
        // 等待資料確定傳送過去時觸發 onload function
        xhr.onload=function(){ handleStateChange(); };

        xhr.onreadystatechange=function(){ handleStateChange(); };
    }
    
    function toXML(data) {
        let xml = Object.keys(data)
                        .map(name => `<${name}>${data[name]}</${name}>`)
                        .join('');
        return `<data>${xml}</data>`;
    }

    function handleStateChange()  //處理動作--讀取XML
    {
    // readyState: 4 代表 request finished and response is ready
    // status: 200 代表 Ok
        if (xhr.readyState==4 && xhr.status==200)
        {
            // var xmlDoc=xhr.responseXML;
            // xmlDoc = xmlhttp.responseXML; 
            document.getElementById("demo").innerHTML=xhr.responseText;
              alert(xhr.responseText);
        }
        // alert(xhr.readyState);
    }

    // window.onload = function() {
    
    // //alert("let's go!");
    // submit();
    // }

    // window.addEventListener( "load", function () {
    //     function submit() { 
    //         var xhr = new XMLHttpRequest();

    //         xhr.open('post','XmlInjection.php',true);
                
    //         // 不同於 get，post 在傳送前要先設定傳送資料的格式，我要傳過去的是 JSON 格式
    //         xhr.setRequestHeader('Content-Type', 'text/xml');

    //         const data = toXML({x : 10})
                
    //             // 接著傳送過去
    //         xhr.send(data);
                
    //         // 等待資料確定傳送過去時觸發 onload function
    //         xhr.onload = function(){
    //             alert(xhr.responseText);
            
    //         }
    //     }
    
    //     function toXML(data) {
    //         let xml = Object.keys(data)
    //                         .map(name => `<${name}>${data[name]}</${name}>`)
    //                         .join('');
    //         return `<data>${xml}</data>`;
    //     }

    //     function sendXmlRequest () {
    //         document.getElementById("demo").style.color = "red";
    //         let data = {
    //             x : 10,
    //             y : 20,
    //             z : 30
    //         }

    //         var request = new XMLHttpRequest();
    //         request.onreadystatechange = handleStateChange; // handleStateChange 參考至函式
    //         request.open('POST', url);
    //         request.setRequestHeader('Content-Type', 'text/xml');
    //         request.send(toXML(data));
    //     }

    //     // Access the form element...
    //     const form = document.getElementById( "myForm" );

    //     // ...and take over its submit event.
    //     form.addEventListener( "submit", function ( event ) {
    //         event.preventDefault();

    //         submit();
    //     } );
    // } );
</script>
</body>
</html>