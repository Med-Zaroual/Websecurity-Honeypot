<!-- include the svg assets later used in the project -->
<link rel="stylesheet" type="text/css" href="Assets/css/error.css">

<svg style="display: none;">
  <symbol id="keyhole" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 26.458333 26.458334"><g transform="translate(0 -270.542)"><circle cx="13.229" cy="279.141" r="8.599" fill="#f1eedb" paint-order="stroke fill markers"/><path d="M10.516 283.271h5.427c1.164 0 1.768.861 2.102 1.802l3.59 10.125c.334.94-.937 1.802-2.102 1.802H6.926c-1.165 0-2.437-.861-2.103-1.802l3.59-10.125c.334-.94.938-1.802 2.103-1.802z" fill="#f1eedb" paint-order="stroke fill markers"/><circle r="6.06" cy="279.141" cx="13.229" fill="#282b24" paint-order="stroke fill markers"/><path d="M11.502 283.76h3.455c.741 0 1.126.733 1.338 1.534l2.286 8.614c.213.8-.597 1.534-1.338 1.534H9.216c-.742 0-1.551-.733-1.339-1.534l2.286-8.614c.212-.8.597-1.534 1.339-1.534z" fill="#282b24" paint-order="stroke fill markers"/></g></symbol>
  <symbol id="key" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 26.458333 26.458334"><circle cx="13.229" cy="279.141" r="8.599" paint-order="stroke fill markers" transform="matrix(0 -.76923 .7499 0 -202.882 23.405)" fill="#f1eedb"/><circle r="8.599" cy="279.141" cx="13.229" paint-order="stroke fill markers" transform="matrix(0 -.5887 .57392 0 -153.756 21.017)" fill="#282b24"/><path fill="#f1eedb" paint-order="stroke fill markers" d="M12.03 12.13h14.428v2.2H12.03z"/><path fill="#f1eedb" paint-order="stroke fill markers" d="M18.147 12.13h2.895v6.772h-2.895zM22.113 12.13h2.716v5.065h-2.716z"/></symbol>
  <symbol id="ghost" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 26.458333 26.458334"><g transform="translate(0 -270.542)"><path d="M4.63 279.293c0-4.833 3.85-8.751 8.6-8.751 4.748 0 8.598 3.918 8.598 8.75H13.23zM4.725 279.293h16.914c.052 0 .19.043.19.096l-.095 14.329c0 .026-.011.05-.028.068a.093.093 0 0 1-.067.028c-.881 0-1.235-1.68-2.114-1.616-.995.072-1.12 2.082-2.114 2.154-.88.064-1.233-1.615-2.115-1.615-.881 0-1.233 1.615-2.114 1.615-.881 0-1.233-1.615-2.114-1.615-.882 0-1.236 1.679-2.115 1.615-.994-.072-1.12-2.082-2.114-2.154-.88-.063-1.41 1.077-2.114 1.616-.021.016-.05-.01-.067-.028a.097.097 0 0 1-.028-.068v-14.33c0-.052.042-.095.095-.095z" fill="#f1eedb" paint-order="stroke fill markers"/><path d="M15.453 281.27a1.987 1.94 0 0 1-.994 1.68 1.987 1.94 0 0 1-1.987 0 1.987 1.94 0 0 1-.994-1.68h1.988z" fill="#282b24" paint-order="stroke fill markers"/><g fill="#282b24" transform="matrix(1 0 0 1.0177 .283 -5.653)"><ellipse cx="10.205" cy="278.668" rx="1.231" ry="1.181" paint-order="stroke fill markers"/><ellipse ry="1.181" rx="1.231" cy="278.668" cx="16.159" paint-order="stroke fill markers"/><ellipse ry=".331" rx=".853" cy="280.936" cx="10.205" opacity=".5" paint-order="stroke fill markers"/><ellipse cx="16.159" cy="280.936" rx=".853" ry=".331" opacity=".5" paint-order="stroke fill markers"/></g><ellipse ry=".614" rx="8.082" cy="296.386" cx="13.229" opacity=".1" fill="#f1eedb" paint-order="stroke fill markers"/></g></symbol>

</svg>

<!-- include in a container a heading, paragraph and svg for the keyhole -->
<div class="container">
  <h1>403</h1>
  <p>access not granted</p>
  <svg class="keyhole">
    <use href="#keyhole"/>
  </svg>
</div>

<!-- outside of the container, to have them absolute positioned in relation to the body, include an svg for the key and one for the ghost -->
<svg class="key">
  <use href="#key"/>
</svg>

<!--
  ! nest the svg in a vi, give the svg and vi the same class
  the div and svg behave differently when translating the element through the transform property, giving a nice distance between the text (included with a pseudo element on the div) and the svg
-->
<div class="ghost">
  <svg class="ghost">
    <use href="#ghost"/>
  </svg>
</div>




<script type="text/javascript">
  // target the elements in the DOM used in the project

/**
 * svg for the key and keyhole
 * div nesting the ghost
 * heading and paragraph
 */
const key = document.querySelector(".key");
const keyhole = document.querySelector(".keyhole");
const ghost = document.querySelector(".ghost");

const heading = document.querySelector("h1");
const paragraph = document.querySelector("p");


// for the length of the timout, consider the --animation-duration custom property and add a small delay
// retrieve properties on the root element
const root = document.querySelector(":root");
const rootStyles = getComputedStyle(root);
// retrieve the animation-duration custom property
// ! this is specified as "40s", in seconds, so parse the number and includ it in milliseconds
const animationDuration = parseInt(rootStyles.getPropertyValue("--animation-duration"))*1000;
let keyTimer = animationDuration*9/8;


// retrieve the dimensions of the key (to have the key exactly where the cursor would lie)
const keyBox = key.getBoundingClientRect();
// console.log(keyBox);


// KEY & KEYHOLE ANIMATION
// include a timeout with the specified time frame
const timeoutID = setTimeout(() => {
  // after the specified time, change the cursor as to seemingly grab the key
  key.parentElement.parentElement.style.cursor = "grab";

  // introduce the key and keyhole svg elements by triggering the paused-by-default animation
  key.style.animationPlayState = "running";
  keyhole.style.animationPlayState = "running";

  // ! pointer-events set to none on the key to allow for a mouseover event on the keyhole
  // the key is indeed used in stead of the normal cursor and would overlap on top of everything
  key.style.pointerEvents = "none";

  // when the cursor hovers anywhere in the window, call a function to update the position of the key and have it match the cursor
  window.addEventListener("mousemove", updateKeyPosition);

  // when the cursor hovers on the keyhole, call a function to grant access and remove present listeners
  keyhole.addEventListener("mouseover", grantAccess);

  clearTimeout(timeoutID);
}, keyTimer);


// define the function which updates the position of the absolute-positioned key according to the mouse coordinates (and the keys own dimensions)
const updateKeyPosition = (e) => {
  let x = e.clientX;
  let y = e.clientY;
  key.style.left = x - keyBox.width/1.5;
  key.style.top = y - keyBox.height/2;
};

// define the function which notifies the user of the grant access
const grantAccess = () => {
  // restore the cursor
  key.parentElement.parentElement.style.cursor = "default";

  // change the text of the heading and paragraph elements
  heading.textContent = '🎉 yay 🎉';
  paragraph.textContent = 'access granted';

  // remove the svg elements for the key and keywhole from the flow of the document
  keyhole.style.display = "none";
  key.style.display = "none";

  // remove the event listeners, most notably the one on the window
  window.removeEventListener("mousemove", updateKeyPosition);
  keyhole.removeEventListener("mouseover", grantAccess);
};

</script>