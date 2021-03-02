function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}

/**
 * A class for a list of random integer elements.
 */
class RandomList {
    /**
     * Create a new list of random integers
     *  
     * @param {Number} min Minimum integer
     * @param {Number} max Maximum integer
     * @param {Number} length Number of elements in the list
     */
    constructor(min, max, length) {
        this._list = [];

        for (let i = 0; i < length; i++) {
            this._list.push(randomInt(min, max));
        }
    }

    isInList(value) {
        for (let i = 0; i < this._list.length; i++) {
            if (this._list[i] === value) {
                return true;
            }
        }

        return false;
    }

    /**
     * Find the number of occurences of a given value in the list.
     * @param {Number} value 
     * @returns {Number} The number of occurences
     */
    count(value) {
        let cnt = 0;
        for (let i = 0; i < this._list.length; i++) {
            if (this._list[i] === value) {
                cnt++;
            }
        }

        return cnt;
    }
}