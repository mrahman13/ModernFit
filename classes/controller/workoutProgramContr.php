<?php

class workoutProgramContr extends workoutProgramModel{
    
    public function WorkoutProgram($workout_name, $notes, $workout_day, $excercises) {
        return $this->saveWorkoutProgram($workout_name, $notes, $workout_day, $excercises);
    }
}