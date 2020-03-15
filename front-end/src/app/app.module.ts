import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HttpClientModule } from '@angular/common/http';
import { FooterComponent } from './footer/footer.component';
import { HeadComponent } from './head/head.component';
import { BodyComponent } from './body/body.component';
import { HeaderComponent } from './header/header.component';
import { SearchBarComponent } from './header/search-bar/search-bar.component';
import { FormsModule } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { SideBarComponent } from './body/side-bar/side-bar.component';
import { DisplayProductsComponent } from './body/display-products/display-products.component';

@NgModule({
  declarations: [
    AppComponent,
    FooterComponent,
    HeadComponent,
    BodyComponent,
    HeaderComponent,
    SearchBarComponent,
    SideBarComponent,
    DisplayProductsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
