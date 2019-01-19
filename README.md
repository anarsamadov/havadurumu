# havadurumu
PHP ile Yahoo Weather Api kullanarak hava durumunu çekme.
http://www.anarsamadov.net

Güncelleme: 01.19.2019

Not: Yahoo hava durumu Api-si güncellendiğinde eski kodları değiştirmem gerekti. Sonuç olarak bir class yazdım ve şuan 10 günlük hava durumunu almak için kullanılabilir.

Detaylı dökümantasyon için :https://developer.yahoo.com/weather/documentation.html#php

Kurulum: Class-i kullanabilmeniz için https://developer.yahoo.com/apps/ adresinde uygulama oluşturup class.weather.php dosyasında 6-8. satırlarda istenen key-leri girmeniz gerekiyor.

İzmir için hava durumu çıktısı.
```
{
location: {
woeid: 2344117,
city: "Izmir",
region: " Izmir Province",
country: "Turkey",
lat: 38.425209,
long: 27.14226,
timezone_id: "Europe/Istanbul"
},
current_observation: {
wind: {
chill: 10,
direction: 135,
speed: 8
},
atmosphere: {
humidity: 78,
visibility: 16.1,
pressure: 996,
rising: 0
},
astronomy: {
sunrise: "8:26 am",
sunset: "6:20 pm"
},
condition: {
text: "Cloudy",
code: 26,
temperature: 10
},
pubDate: 1547924400
},
forecasts: [
{
day: "Fri",
date: 1547845200,
low: 8,
high: 15,
text: "Mostly Cloudy",
code: 28
},
{
day: "Sat",
date: 1547931600,
low: 9,
high: 13,
text: "Rain",
code: 12
},
{
day: "Sun",
date: 1548018000,
low: 8,
high: 13,
text: "Rain",
code: 12
},
{
day: "Mon",
date: 1548104400,
low: 6,
high: 13,
text: "Scattered Showers",
code: 39
},
{
day: "Tue",
date: 1548190800,
low: 11,
high: 13,
text: "Showers",
code: 11
},
{
day: "Wed",
date: 1548277200,
low: 11,
high: 13,
text: "Showers",
code: 11
},
{
day: "Thu",
date: 1548363600,
low: 11,
high: 13,
text: "Showers",
code: 11
},
{
day: "Fri",
date: 1548450000,
low: 9,
high: 13,
text: "Scattered Showers",
code: 39
},
{
day: "Sat",
date: 1548536400,
low: 7,
high: 12,
text: "Rain",
code: 12
},
{
day: "Sun",
date: 1548622800,
low: 6,
high: 11,
text: "Mostly Cloudy",
code: 28
}
]
}
```