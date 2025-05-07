

function createXMLHttpRequestObject() 
{
  let ajaxObject = false;
  if (window.XMLHttpRequest) 
  {
    ajaxObject = new XMLHttpRequest();
    alert("ajx");
  } 
  else
  {
    ajaxObject = false;
  }
  
  return ajaxObject;
}


function grabFile(file) 
{
  let isAjax = createXMLHttpRequestObject();

  if (isAjax) 
    {
		isAjax.onreadystatechange = function() 
      {
		getCurrentState(isAjax);
      };

    isAjax.open("GET", file, true);
    isAjax.send(null);
  }
}

function getCurrentState(thisFile) 
{
   if (thisFile.readyState == 4) 
  {
    if (thisFile.status == 200 || thisFile.status == 304) 
	{
	  document.getElementById('para3').innerHTML = 
	  thisFile.responseText;
    }
  }
}


document.addEventListener("DOMContentLoaded", function () {
  const link = document.getElementById("loadLink");

  link.addEventListener("click", function (e) {
    e.preventDefault();
    grabFile(this.href);
  });
});














