<?php

namespace Database\Factories;

use App\Models\Attachment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'attachments/apple.png',
            'attachments/blank.pdf',
            'attachments/task.jpg',
            'attachments/tower.jpg'
        ];
        $file = $images[array_rand($images)];
        return [
            'user_id' => User::factory(),
            'task_id' => Task::factory(),
            //'file' => $file,
            'file' => 'attachments/apple.png',
            //'filename' => pathinfo($file)['filename'],
            'filename' => 'apple',
            //'size' => filesize('public/storage/'.$file),
            'size' => 4000,
            //'type' => pathinfo($file)['extension'],
            'type' => 'png'
        ];
    }
}
