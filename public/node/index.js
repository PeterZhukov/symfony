'use strict';

let animal = {
    walk() { alert("I'm walking"); console.log(this); }
};

let rabbit = {
    __proto__: animal,
    walk() {
        super.walk();
    }
};

let walk = rabbit.walk; // скопируем метод в переменную
walk(); // вызовет animal.walk()
// I'm walking
rabbit.walk();