'use strict';

class Animal {
    constructor(name) {
        this.name = name;
    }
}

class Rabbit extends Animal {
    constructor() {
        this.name = 'Peter';
        alert(this); // ошибка, this не определён!
        // обязаны вызвать super() до обращения к this
        super();
        // а вот здесь уже можно использовать this
    }
}

new Rabbit();