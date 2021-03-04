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
        // Option 3:
        // this._set = new Set();

        // Option 4:
        this._map = new Map();

        for (let i = 0; i < length; i++) {
            const randomNumber = randomInt(min, max);
            this._list.push(randomNumber);
            // Option 3: Zusätzliche Erzeugung eines Sets
            // this._set.add(randomNumber);

            // Option 4: Map updaten
            if (this._map.has(randomNumber)) {
                const cnt = this._map.get(randomNumber);
                this._map.set(randomNumber, cnt + 1);
            } else {
                this._map.set(randomNumber, 1);
            }
        }

        // Option 2: Sortieren der Liste
        // this._list.sort(function compare(a, b) {
        //     return a - b;
        // });
    }

    isInList(value) {
        // // Option 1: suchen in der Liste nach einem Wert
        // for (let i = 0; i < this._list.length; i++) {
        //     if (this._list[i] === value) {
        //         return true;
        //     }
        //     // Option 2: abbrechen, wenn der Wert in einer geordneten Liste nicht mehr gefunden werden kann
        //     else if (this._list[i] > value) {
        //         return false;
        //     }
        // }

        // return false;

        // Option 3: Nutzen von Set
        // return this._set.has(value);

        // Option 4: Nutzen von Map. Wenn value kein Schlüssel in der Map ist, kommt value nicht vor
        return this._map.has(value);
    }

    /**
     * Find the number of occurences of a given value in the list.
     * @param {Number} value 
     * @returns {Number} The number of occurences
     */
    count(value) {
        //     // Option 1: Durchsuchen der Liste
        //     let cnt = 0;
        //     for (let i = 0; i < this._list.length; i++) {
        //         if (this._list[i] === value) {
        //             cnt++;
        //         } else if (this._list[i] > value) {
        //             return cnt;
        //         }
        //     }

        //     return cnt;
        return this._map.get(value);
    }
}