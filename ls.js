  
    function loginvalid() {
        var adr = document.getElementById('email').value;
        var pass = document.getElementById('password').value;
        var atIndex = adr.indexOf('@');
        var dotIndex = adr.lastIndexOf('.');
        s=0;
        p=0;
        if (atIndex < 1 || dotIndex < atIndex + 2 || dotIndex + 2 >= adr.length) {
            alert("Invalid email");
        
        } else {
            s=1;
        }
        if (pass === '') {
            alert("Please enter your password.");
            
        }else{
            p=1;

        }




        if (s==1&& p==1){

            document.getElementById("myForm0").submit();
            //window.location.href = "main.html";
        }



    }


            function nbesp(fullname){
                s=0;
                for (i=0;i<fullname.length;i++){
                    if (fullname[i]==' '){s++;}

                }return s;
            }

    function siginvalid(){
        var fullname = document.getElementById('fullname').value;
        var adr = document.getElementById('email1').value;
        var pass = document.getElementById('password1').value;
        var sel = document.getElementById('selection').value;

        var atIndex = adr.indexOf('@');
        var dotIndex = adr.lastIndexOf('.');
        var esp = fullname.indexOf(' ');
        n=0
        l=0
        e=0;
        p=0;
        if(fullname.length<1||esp==0 || esp==fullname.length || nbesp(fullname)!=1){
            alert("full name invalide")

        }else{
            n=1;
            
        }

        if(sel=='option0'){
            alert("select section")

        }else{
            l=1;

        }


        if (atIndex < 1 || dotIndex < atIndex + 2 || dotIndex + 2 >= adr.length) {
            alert("Invalid email");
        
        } else {
            
            e=1;
        }
        if (pass === '') {
            alert("Please enter your password.");
            
        }else{
            
            p=1;

        }

        



        if (n==1&& l==1&&e==1&& p==1){
            alert("compte registree");

            document.getElementById("myForm").submit();
        }






    }
