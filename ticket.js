// const p = document.body.getElementsByTagName("p");
// console.log(p);


// console.log(localStorage.getItem('ticketPrice'))
let value4=localStorage.getItem('NormalSeats');
 document.write("<br>"+" NormalSeats :"+value4+"<br>");

 let value5=localStorage.getItem('VipSeats');
 document.write("<br>"+" VIPSeats :"+value5+"<br>");


let value3=Number.parseInt(localStorage.getItem('NormalSeatsIndex'));
 document.write("<br>"+" selected NormalSeat :"+value3+"<br>");

 let value2=Number.parseInt(localStorage.getItem('vipSeatsIndex'));

 document.write("<br>"+" selected vipSeat :"+value2+"<br>");

let value = Number.parseInt(localStorage.getItem('ticketPrice'));
document.writeln("<br>"+ "Total Price :"+value);

// let p = document.createElement('p');
// p.innerText = value
// document.body.append(p)
// span.innerText = value;