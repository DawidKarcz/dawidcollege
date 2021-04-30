<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all()->load('enrolments.lecturer');


        return response()->json(
          [
              'status' => 'success',
              'data' => $courses
          ],
          200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:50',
            'code' => 'required|string|max:5',
            'description' => 'required|string',
            'points' => 'required|integer|min:100,max:600',
            'level' => 'required|integer|min:7,max:10'
        ]);

        if ($validator->fails()) {
          return response()->json(
            [
              'status' => 'Error: see errors',
              'errors' => $validator->errors()
            ],
            422);
        }

        $course = new Course();
        $course->title = $request->input('title');
        $course->code = $request->input('code');
        $course->description = $request->input('description');
        $course->points = $request->input('points');
        $course->level = $request->input('level');
        $course->save();

        return response()->json(
          [
              'status' => 'success',
              'data' => $course
          ],
          200
        );

    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        if ($course === null) {
          $statusMsg = 'Course not found!';
          $statusCode = 404;
        }
        else {
          $course->load('enrolments.lecturer');
          $statusMsg = 'success';
          $statusCode = 200;
        }

        return response()->json(
          [
              'status' => $statusMsg,
              'data' => $course
          ],
          $statusCode);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        if ($course === null) {
          return response()->json(
            [
                'status' => 'Course not found!',
                'data' => null
            ],
            404);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:50',
            'code' => 'required|string|max:5',
            'description' => 'required|string',
            'points' => 'required|integer|min:100,max:600',
            'level' => 'required|integer|min:7,max:10'
        ]);

        if ($validator->fails()) {
          return response()->json(
            [
              'status' => 'Error: see below',
              'errors' => $validator->errors()
            ],
            422);
        }


        $course->title = $request->input('title');
        $course->code = $request->input('code');
        $course->description = $request->input('description');
        $course->points = $request->input('points');
        $course->level = $request->input('level');
        $course->save();

        return response()->json(
          [
              'status' => 'success',
              'data' => $course
          ],
          200
        );
    }

    public function destroy(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        if ($course->enrolments->count() == 0) {
            $course->delete();
            return response()->json(['message' => 'Successfully deleted'], 200);
        }
        else {
            return response()->json(['message' => 'Course not deleted'], 422);
        }
    }
}
