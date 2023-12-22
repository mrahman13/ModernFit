<?php

class workoutProgramContr extends workoutProgramModel{
    
    public function WorkoutProgram($workout_name, $notes, $workout_day, $excercises,$selected_member_id,$personal_trainer_id) {
        return $this->saveWorkoutProgram($workout_name, $notes, $workout_day, $excercises,$selected_member_id,$personal_trainer_id);
    }
}