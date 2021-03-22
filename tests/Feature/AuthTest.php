<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testNameRequiredRegister(): void
    {
        $user = User::factory()->create();

        $this->post(route('register'), [
            'email' => $this->faker->unique()->safeEmail,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ])
            ->assertSessionHasErrors([
                'name'
            ])
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function testNameStringRegister(): void
    {
        $user = User::factory()->create();

        $this->post(route('register'), [
            'name' => 0,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ])
            ->assertSessionHasErrors([
                'name'
            ])
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function testNameMax255Register(): void
    {
        $user = User::factory()->create([
            'name' => $this->faker->text(1000)
        ]);

        $this->post(route('register'), [
            'name' => $user->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ])
            ->assertSessionHasErrors([
                'name'
            ])
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function testEmailRequiredRegister(): void
    {
        $user = User::factory()->create();

        $this->post(route('register'), [
            'name' => $user->name,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ])
            ->assertSessionHasErrors([
                'email'
            ])
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function testEmailIsEmailRegister(): void
    {
        $user = User::factory()->create([
            'email' => $this->faker->word
        ]);

        $this->post(route('register'), [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ])
            ->assertSessionHasErrors([
                'email'
            ])
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function testEmailPasswordRequiredRegister(): void
    {
        $user = User::factory()->create();

        $this->post(route('register'), [
            'name' => $user->name,
            'email' => $this->faker->unique()->safeEmail,
            'password_confirmation' => $user->password
        ])
            ->assertSessionHasErrors([
                'password'
            ])
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function testEmailPasswordMatchConfirmationRegister(): void
    {
        $user = User::factory()->create();

        $this->post(route('register'), [
            'name' => $user->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $user->password,
            'password_confirmation' => $this->faker->password
        ])
            ->assertSessionHasErrors([
                'password'
            ])
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function testEmailPasswordMin6Register(): void
    {
        $user = User::factory()->create([
            'password' => $this->faker->password(0, 5)
        ]);

        $this->post(route('register'), [
            'name' => $user->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ])
            ->assertSessionHasErrors([
                'password'
            ])
            ->assertStatus(Response::HTTP_FOUND);
    }

    public function testUserCanRegister(): void
    {
        $user = User::factory()->create();

        $this->post(route('register'), [
            'name' => $user->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ])
            ->assertSessionDoesntHaveErrors()
            ->assertStatus(Response::HTTP_OK);
    }
}
