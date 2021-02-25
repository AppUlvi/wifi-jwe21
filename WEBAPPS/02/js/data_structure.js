/**
 * A class for data structures 
 */

class List {

    constructor(name, seperator) {
        this._name = name;
        if (seperator === undefined) {
            this._seperator = ', ';
        } else {
            this._seperator = seperator;
        }
        this._list = [];
    }

    /**
     * @returns Returns the name and content of this list
     */

    toString() {
        return this._name + ": " + this._list.join(this._seperator);
    }
}

class Queue extends List {
    // "_": beschreibt interne Variable
    constructor(name, seperator) {
        super(name + '-Queue', seperator);
    }

    enqueue(element) {
        this._list.push(element);
    }

    dequeue() {
        return this._list.shift();
    }

    toString() {
        return super.toString();
    }
}

class Stack extends List {
    // "_": beschreibt interne Variable
    constructor(name, seperator) {
        super(name + '-Stack', seperator)
    }

    push(element) {
        this._list.push(element);
    }

    pop() {
        return this._list.pop();
    }

    toString() {
        return super.toString();
    }
}