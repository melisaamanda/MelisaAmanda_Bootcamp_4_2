import { Injectable, Input, Output } from '@angular/core';

@Injectable()
export class DataApiService {

  courseList : Object[] = [
    {'course_id' : '1', 'course_name' : 'Programming Fundamental - HTML5 & PHP'},
    {'course_id' : '2', 'course_name' : 'Object Oriented Programming'},
    {'course_id' : '3', 'course_name' : 'Database Design & Query'},
    {'course_id' : '4', 'course_name' : 'Front End using Angular 4'},
    {'course_id' : '5', 'course_name' : 'Back End using Laravel 5'}
  ];

  constructor() { }

  addCourse(obj:Object):Object[] {
    this.courseList.push(obj);
    return this.courseList;
  }

  getCourseList() {
    return this.courseList;
  }

}
