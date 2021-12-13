import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ViewTransacPageRoutingModule } from './view-transac-routing.module';

import { ViewTransacPage } from './view-transac.page';
import { SharedModule } from 'src/app/components/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ViewTransacPageRoutingModule,
    SharedModule
  ],
  declarations: [ViewTransacPage]
})
export class ViewTransacPageModule {}
