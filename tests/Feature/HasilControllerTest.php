<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Answer;
use App\Models\Siswa;
use App\Models\Question;
use App\Models\Category;

class HasilControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user for authentication
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_export_method_returns_excel_download()
    {
        // Create test data
        $category = Category::create(['name' => 'A', 'description' => 'Category A']);
        $siswa = Siswa::create(['nama_siswa' => 'Test Student', 'nis' => '12345', 'kelas' => '10A']);
        $question = Question::create([
            'id_soal' => 'Q001',
            'question_text' => 'Test Question',
            'id_option_a' => 1,
            'option_a' => 'Option A',
            'id_option_b' => 2,
            'option_b' => 'Option B',
            'id_option_c' => 3,
            'option_c' => 'Option C',
            'category' => 'A'
        ]);

        // Create answers
        Answer::create([
            'nis' => '12345',
            'id_soal' => $question->id_soal,
            'id_option_chosen' => 1,
            'answer_code' => 'TEST001'
        ]);

        // Test the export route
        $response = $this->get('/hasil/export');

        // Assert that the response is a download
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->assertHeader('Content-Disposition', 'attachment; filename=hasil_kuisioner_' . date('Y-m-d_H-i-s') . '.xlsx');
    }
}
