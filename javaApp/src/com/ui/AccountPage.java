package com.ui;

import javax.swing.*;

class AccountPage extends Page {
    
    AccountPage(final Session session) {
        super(session);

        add(new JLabel("Unfortunately, all your money has been lost. :("));
    }

}
