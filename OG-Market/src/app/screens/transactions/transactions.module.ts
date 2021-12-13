import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { TransactionsPageRoutingModule } from './transactions-routing.module';

import { TransactionsPage } from './transactions.page';
import { TransacCardModule } from 'src/app/components/transac-card/transac-card.component.module';


@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    TransactionsPageRoutingModule,
    TransacCardModule,
   
    
  ],
  declarations: [TransactionsPage]
})
export class TransactionsPageModule {}
