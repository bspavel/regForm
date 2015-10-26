	function set_width_button_pass()
		{
			var vbutton 	   	= document.getElementById('but_pass');
			var vregBt      	= document.getElementById('ref_button').offsetHeight;
			var vwidth			=(vregBt - vbutton.offsetHeight)+vbutton.offsetHeight;
			vbutton.style.setProperty
			(
				"padding", "6px "+vwidth+"px "
				+"6px "+vwidth+"px", null
			);
		}

	function dtObjSize( vTbl, vDiv )
		{
			var vHeight = document.getElementById(vTbl).offsetHeight;
			document.getElementById(vDiv).style.top			='0px';
			document.getElementById('left').style.height	=vHeight+'px';
			document.getElementById('right').style.height	=vHeight+'px';
		}

	function dtShow(vID)
		{
			document.getElementById("buttonDiv").className="hide";
			document.getElementById("regDiv").className="hide";
			document.getElementById("loginDiv").className="hide";
			document.getElementById("profileDiv").className="hide";

			document.getElementById("buttonHelp").className="hide";
			document.getElementById("regHelp").className="hide";
			document.getElementById("loginHelp").className="hide";
			document.getElementById("profileHelp").className="hide";

			console.log(vID);

			document.getElementById(vID+'Div').className="show";
			document.getElementById(vID+'Help').className="show";

			var el=document.getElementById("langId");
			var lang = el.options[el.selectedIndex].value;
			document.getElementById(vID+'form').action='index.php?view='+vID+'&lg='+lang;

			document.getElementById('viewPage').value=vID;
			dtObjSize( vID+'Tbl', vID+'Div' );
		}

	function eye()
		{
			document.getElementById("eye").setAttribute("style", "display:block;cursor:pointer;");	
			document.getElementById("eye_show").setAttribute("style", "display:none;cursor:pointer;");
		}
	function checkSecPass(input)
        {
            if(input.value != document.getElementById('first_pass').value)
                {
                    input.setCustomValidity('Password Must be Matching.');
                }
                else {input.setCustomValidity('');}
        }
		
	function checkSecEmail(input)
		{
			if(input.value != document.getElementById('first_post').value)
                {
                    input.setCustomValidity('Email Must be Matching.');
                }
            else {input.setCustomValidity('');}
		}

	document.addEventListener("DOMContentLoaded", function(event)
		{
			eye();
			document.getElementById("eye_show").addEventListener("click", function()
			{ 
				document.getElementById("eye").setAttribute("style", "display:block;cursor:pointer;");	
				document.getElementById("eye_show").setAttribute("style", "display:none;cursor:pointer;");
				document.getElementById("first_pass").setAttribute("type", "password");	
				document.getElementById("second_pass").setAttribute("type", "password");
			});
		
			document.getElementById("eye").addEventListener("click", function()
			{ 
				document.getElementById("eye").setAttribute("style", "display:none;cursor:pointer;");	
				document.getElementById("eye_show").setAttribute("style", "display:block;cursor:pointer;");
				document.getElementById("first_pass").setAttribute("type", "text");
				document.getElementById("second_pass").setAttribute("type", "text");
			});
		
			set_width_button_pass();
		});		