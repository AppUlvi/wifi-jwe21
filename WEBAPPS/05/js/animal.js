class Animal {
    /**
     * Creates an animal with a name 'name'.
     * @param {string} name 
     */
  constructor(name) {
    this.name = name;
  }
      talk() {
        return this.name + " makes a noise.";
    }
}


class Dog extends Animal{
    /**
     * Creates a dog with a name 'name'.
     * @param {string} name 
     */
    constructor(name) {
        super(name);
    }

    /**
     * Returns the sound of a dog.
     * @returns {string} Sound
     */
    talk() {
        super.talk();
        new Audio('audio/dog.mp3').play();
        return this.name + " is barking.";
    }
}

class Cow extends Animal{
    /**
     * Creates a cow with a name 'name'.
     * @param {string} name 
     */
    constructor(name) {
        super(name);
    }

    /**
     * Returns the sound of a cow.
     * @returns {string} Sound
     */
    talk() {
        super.talk();
        new Audio('audio/cow.mp3').play();
        return this.name + " is mooing.";
    }
}

class Horse extends Animal{
    /**
     * Creates a horse with a name 'name'.
     * @param {string} name 
     */
    constructor(name) {
        super(name);
    }

    /**
     * Returns the sound of a horse.
     * @returns {string} Sound
     */
    talk() {
        super.talk();
        new Audio('audio/horse.mp3').play();
        return this.name + " is neighing.";
    }
}

class Cat extends Animal{
    /**
     * Creates a cat with a name 'name'.
     * @param {string} name 
     */
    constructor(name) {
        super(name);
    }

    /**
     * Returns the sound of a cat.
     * @returns {string} Sound
     */
    talk() {
        super.talk();
        new Audio('audio/cat.mp3').play();
        return this.name + " is meowing.";
    }
}