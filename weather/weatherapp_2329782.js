let city='Belfast'
// const API_KEY= 'fbfacabfab5d390352db75280774894d'
       
const searchBox = document.querySelector(".search input");
const searchBtn = document.querySelector(".search button");
const weatherIcon = document.querySelector(".weather-icon");
searchBtn.addEventListener("click",()=>{
  city=searchBox.value;

  const cachedData = localStorage.getItem(city);
  if (!navigator.onLine) {
    const cachedData = localStorage.getItem(city);
    if (cachedData) {
      console.log("User is offline. Data fetched from cache");
      displayWeather(JSON.parse(cachedData).data);
    }

  }else{

  if (cachedData) {
    const parsedData = JSON.parse(cachedData);
    const cacheTimestamp = parsedData.timestamp;
    const currentTime = Date.now();
    const timeDifference = currentTime - cacheTimestamp;
    const fiveMinutesInMilliseconds = 5 * 60 * 1000;

    if (timeDifference < fiveMinutesInMilliseconds) {
      console.log("Data fetched from cache");
      displayWeather(parsedData.data);
      return;
    } else {
      // Clear the key from local storage if the time difference exceeds 5 minutes
      localStorage.removeItem(city);
      console.log("removed")
    }
  }

  checkWeather()
  
}
return searchBox;
})
a= document.getElementById("bla")
a.addEventListener("click",()=>{
location.reload();
})
//  const backgroundImg = document.querySelector(body);
 
async function checkWeather(){
 const API_KEY= 'fbfacabfab5d390352db75280774894d'
 const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${API_KEY}&units=metric`)
 var data = await response.json();
 const currentTimestamp = Date.now();
 const weatherData = {
  timestamp:currentTimestamp,
  data: data
 };
 localStorage.setItem(city, JSON.stringify(weatherData)); // Store the latest weather data in local storage
  return displayWeather(data);
};
const displayWeather = (data) => {
 console.log(data);
 document.querySelector(".city").innerHTML=data.name;
 document.querySelector(".temp").innerHTML=Math.round(data.main.temp)+"°C"; 
 document.querySelector(".max").innerHTML=data.main.feels_like+"°C"; 
 // document.querySelector(".min").innerHTML=data.main.temp_min+"°C"; 
 document.querySelector(".humidity").innerHTML=data.main.humidity+"% ";
 document.querySelector(".wind").innerHTML=data.wind .speed+"km/hr";
 document.querySelector(".pressure").innerHTML=data.main.pressure+"Pa";
 document.querySelector(".rainfall").innerHTML
 const { "1h": rain1h, "3h": rain3h } = data.rain || {}; 
 const rainfall = rain1h ? rain1h + " mm (1h)" : rain3h ? rain3h + " mm (3h)" : "N/A";
 document.querySelector(".rainfall").innerHTML = rainfall;
 // document.querySelector(".time").innerHTML
 //  Adding time
 // const timezoneoffset = data.timezone / 1600;
 // const now = new Date();
 // now.setHours(now.getHours()+timezoneoffset)
 // const currenttime = now.toLocaleTimeString("en-US",{
 // hour:"numeric",
 // minute: "numeric",
 // hour12:true,
 // timezone:data.timezone,
//  document.querySelector(".time").innerHTML
//  //Adding time
//  const timezoneoffset = data.timezone / 1600;
//  const now = new Date();
//  now.setHours(now.getHours()+timezoneoffset)
//  const currenttime = now.toLocaleTimeString("en-US",{
//  hour:"numeric",
//  minute: "numeric",
//  hour12:true,
//  timezone:data.timezone,
// });
// document.querySelector(".time").innerHTML = currenttime;
document.querySelector(".day").innerHTML
//Adding Days
const days = ["Sunday","Monday","Tuesday", "Wednesday", "Thursday","Friday","Saturday"]
const currentDate = new Date();
const currentDay = days[currentDate.getDay()];
document.querySelector(".day").innerHTML = currentDay;
document.querySelector(".date").innerHTML
//Adding Date
const today = new Date();
const date = today.getDate();
const month = today.getMonth() + 1; 
const year = today.getFullYear();
document.querySelector(".date").innerHTML=`${date}/ ${month}/ ${year}`

//  document.querySelector(".day").innerHTML = currentDay;
 if(data.weather[0].main=="Clouds"){
   weatherIcon.src = "clouds_2329782.png";
 }
 else if(data.weather[0].main=="Clear"){
   weatherIcon.src = "clear_2329782.png";
 }
 else if(data.weather[0].main=="Rain"){
   weatherIcon.src = "rain_2329782.png";
 }
 else if(data.weather[0].main=="Drizzle"){
   weatherIcon.src = "drizzle_2329782.png";
 }
 else if(data.weather[0].main=="Mist"){
   weatherIcon.src = "mist_2329782.png";
 }
 else if(data.weather[0].main=="Snow"){
   weatherIcon.src = "snow_2329782.png";
 }
 if(data.cod=="404"){
   document.getElementById("box").innerHTML=`Error`
 }

 // if(data.weather[0].main=="Rain"){
 //   backgroundImg.src = "wallpaperflare.com_wallpaper.jpg";
 // }
 // else{
 //   backgroundImg.src = "wallpaperflare.com_wallpaper.png";
 // }
 // else if(data.weather[0].main=="Clear"){
 //   weatheIcon.src = "rain.png";
 // }
//   document.querySelector(".weather").innerHTML=`
// <img src="https://openweathermap.org/img/w/${data.weather[0].icon}.png" class="weather-icon">`;


//  const weatherIcon = document.querySelector('.weather-icon');
// fetchWeather: function (city) {

// .then(response => response.json())
// .then(data =>{
//   console.log(data)
 
// document.querySelector(".weat").innerHTML=data.weather.0.description; 

//  weatherIcon.style.backgroundImage = `url('https://openweathermap.org/img/w/${data.weather[0].icon}.png')`;
}
// searchBtn.addEventListener("click",()=>{
//  city=searchBox.value;
//  checkWeather()
 
// })
// checkWeather()
// a= document.getElementById("bla")
// a.addEventListener("click",()=>{
// location.reload();
// })
  // Check if data exists in local storage for the default city
  async function checkStorage() {
    const cachedData = localStorage.getItem(city);
    if (cachedData) {
      const parsedData = JSON.parse(cachedData);
      const cacheTimestamp = parsedData.timestamp;
      const currentTime = Date.now();
      const timeDifference = currentTime - cacheTimestamp;
      const fiveMinutesInMilliseconds = 5 * 60 * 1000;
  
      if (timeDifference < fiveMinutesInMilliseconds) {
        console.log("Data fetched from cache");
        displayWeather(parsedData.data);
        return;
      } else {
        // Clear the key from local storage if the time difference exceeds 5 minutes
        localStorage.removeItem(city);
      }
    }
  
    await checkWeather();
  }
  
    
    // Check if user is offline and fetch data if necessary
    function checkUserStatus() {
      if (!navigator.onLine) {
        const cachedData = localStorage.getItem(city);
        if (cachedData) {
          console.log("User is offline. Data fetched from cache");
          displayWeather(JSON.parse(cachedData).data);
        }
      }
    }
     // Execute the functions on page load
  checkUserStatus();
  checkStorage();