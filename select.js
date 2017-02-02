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
    console.log("FILTER IS NULL");
}, false);

  filter_container.addEventListener('click',  function(e){
  console.log(filter);
    if (filter != null)
      filter.style.border = "none";
    e.target.style.border = "5px solid black";
    filter = e.target
    console.log(e.target.id);
  });
