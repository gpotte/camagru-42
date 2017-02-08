var filter = null,
    filter_container = document.querySelector('#filter_container'),
    startbutton  = document.querySelector('#startbutton'),
    filter_list = document.querySelector('#filter_container').getElementsByTagName('img');


startbutton.addEventListener('click', function(ev){
  if (filter != null)
  {
    takepicture();
    ev.preventDefault();
  }
  else
    alert("FILTER IS NULL");
}, false);

  filter_container.addEventListener('click',  function(e){
  if (e.target.id != "filter_container")
  {
    console.log(filter);
    if (filter != null)
      filter.style.border = "none";
    console.log(filter);

    if (e.target == filter)
      filter = null;
    else
    {
      e.target.style.border = "5px solid black";
      filter = e.target
    }
  }
    console.log(e.target.id);
  });
