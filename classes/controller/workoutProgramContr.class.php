<?php

class workoutProgramContr extends workoutProgramModel{
    
    public function WorkoutProgram($workout_name, $notes, $workout_day, $excercises,$member_id,$personal_trainer_id) {
        return $this->SaveWorkoutProgram($workout_name, $notes, $workout_day, $excercises,$member_id,$personal_trainer_id);
    }
}