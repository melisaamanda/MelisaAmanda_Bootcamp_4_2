import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { CourseListComponent } from './course-list/course-list.component';

import { DataApiService } from './data-api.service';

@NgModule({
  declarations: [
    AppComponent,
    CourseListComponent
  ],
  imports: [
    BrowserModule, FormsModule
  ],
  providers: [DataApiService],
  bootstrap: [AppComponent]
})
export class AppModule { }
