<?php

class Tier_Maus extends Tier {

    public function getName() {
        $name = parent::getName();
        return $name . " (Maus)";
    }


    public function makeSound() {
        return "Pieps";
    }
}
