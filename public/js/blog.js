(function ($) {
  // Start of use strict
  "use strict";

  // Show the navbar when the page is scrolled up
  var MQL = 992;

  //primary navigation slide-in effect
  if ($(window).width() > MQL) {
    var headerHeight = $('#mainNav').height();
    $(window).on('scroll', {
        previousTop: 0
      },
      function () {
        var currentTop = $(window).scrollTop();
        //check if user is scrolling up
        if (currentTop < this.previousTop) {
          //if scrolling up...
          if (currentTop > 0 && $('#mainNav').hasClass('is-fixed')) {
            $('#mainNav').addClass('is-visible');
          } else {
            $('#mainNav').removeClass('is-visible is-fixed');
          }
        } else if (currentTop > this.previousTop) {
          //if scrolling down...
          $('#mainNav').removeClass('is-visible');
          if (currentTop > headerHeight && !$('#mainNav').hasClass('is-fixed')) $('#mainNav').addClass('is-fixed');
        }
        this.previousTop = currentTop;
      });
  } //End: if

  //get blog post container
  var container = document.getElementById('blog-posts');

  //get load more button
  var load_more_btn = document.getElementById('load-more');

  //Note: this variable keep track ajax request progress
  //because ajax is asynchronous so we have to make sure previous request is being loade
  var request_in_progress = false;

  /**
   * show spinner if request is in progress
   */
  function showSpinner() {
    var spinner = document.getElementById('spinner');
    spinner.style.display = "block";
  }

  /**
   * hide spinner after request successful
   */
  function hideSpinner() {
    var spinner = document.getElementById('spinner');
    spinner.style.display = "none";
  }

  function showLoadMOre() {
    load_more_btn.style.display = "block";
  }

  function hideLoadMore() {
    load_more_btn.style.display = "none";
  }


  function appendToDiv(div, new_html) {
    //Create new div tag
    var temp = document.createElement('div');

    //put the new html into a temporary div
    //Note: this causes browser to parse (new_html) as element on page
    //which allow us to traverse the dom
    temp.innerHTML = new_html;

    if(temp.innerHTML === ""){
      load_more_btn.innerText =  "End of posts";
      return;
  }

    //get the class name of the first child element
    //Note: use firstElementChild because of how javascript treat white space
    var class_name = temp.firstElementChild.className;
    
    //get class .blog-post inside #blog-post
    var items = temp.getElementsByClassName(class_name);
    //Note: the length property of items change every time the loop runs
    var len = items.length;

    //cycle over items
    for (let i = 0; i < len; i++) {
      div.appendChild(items[0]);
    }

  }

  function setTotalPages(total_pages){
    //set data-total attribute
    load_more_btn.setAttribute('data-total', total_pages);
  }

  function setCurrentPage(page) {
    // console.log("IncrementPage", page);
    //set data-page attribute
    load_more_btn.setAttribute('data-page', page);
  }



  function loadMore() {
    //check if ajax request is in progress
    if (request_in_progress) {
      return;
    }

    //set request in progres to true while previous request still loading
    request_in_progress = true;
    showSpinner();
    hideLoadMore();

    //set initial page
    var page = parseInt(load_more_btn.getAttribute('data-page'));
    var total_pages = parseInt(load_more_btn.getAttribute('data-total'));

    if(page > total_pages || total_pages == 0){
      hideSpinner();
      return;
    }
    
    var next_page = page + 1;


    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://blog.app.com/pages/blog_posts/' + next_page, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        
        var json = JSON.parse(result);

        //hide spinner
        hideSpinner();

        //set current page
        setCurrentPage(next_page);
        //set total pages
        setTotalPages(json.total_pages);
        
        //Append result to the end of blog-post container
        appendToDiv(container, json.html);
        
        //show load more button
        showLoadMOre();
        //reset request in progress to false after succesful response
        request_in_progress = false;
      }
    }

    xhr.send();
  }

  load_more_btn.addEventListener('click', loadMore);


  //load initial page(first page) with ajax
  loadMore();

})(jQuery); // End of use strict