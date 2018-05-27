# crud-application-module-in-laravel

## you can get full project using git clone
```
Step1:- Run command on terminal git clone https://github.com/vermaboys/crud-application-module-in-laravel.git
Step2:- Run command on terminal php artisan migrate
Step3:- Now you can access using http://localhost/crud-application-module-in-laravel/student
```

## you can also write code in own project using following instructions

```
Create Migration:- Run command on terminal php artisan make:migration create_student_table --create=student
This will create our student migration in app/database/migrations. Open up that file and let's add name and email fields.

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('email', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
```

```
let's create a simple Eloquent model so that we can access the nerds in our database easily.
Run command php artisan make:model Student
This will create our Student Model in appns. Open up that file and let's add table and column's table.


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table='student';
    protected $fillable=['name','email'];
}
```

```
Let's go ahead and do that. This is the easy part. From the command line in the root directory of your Laravel project, type:

php artisan make:controller StudentController --resource  This will create our resource controller with all the methods we need in app/controllers.

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();

        return View::make('student.index')->with('student', $student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $student = new Student;
        $student->name       = $request->name;
        $student->email      = $request->email;
        $student->save();

        // redirect
        Session::flash('message', 'Successfully created');
        return Redirect::to('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the student
        $student = Student::find($id);

        // show the view and pass the student to it
        return View::make('student.show')
            ->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        // show the edit form and pass the student
        return View::make('student.edit')
            ->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $student = Student::find($id);
        $student->name       = $request->name;
        $student->email      = $request->email;
        $student->save();

        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $student = Student::find($id);
        $student->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('student');
    }
}
```

```
Create student folder in resources\views
student
	|=>index.blade.php
	|=>create.blade.php
	|=>show.blade.php
	|=>edit.blade.php
```

```
index.blade.php
Copy all code in resources\views\student\index.blade.php file and paste in own index.blade.php file

create.blade.php
Copy all code in resources\views\student\create.blade.php file and paste in own create.blade.php file

show.blade.php
Copy all code in resources\views\student\show.blade.php file and paste in own show.blade.php file

edit.blade.php
Copy all code in resources\views\student\edit.blade.php file and paste in own edit.blade.php file
```

```
Now you can access using http://localhost/your-root-directory-name/student
```