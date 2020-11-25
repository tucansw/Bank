package com.ui;

import java.util.Arrays;

import java.awt.FlowLayout;
import javax.swing.*;

/**
 * The central manager hosting a single user session (from login to logout).
 */
final class Session {
    // Using an internal state machine to manage the current session state
    private enum State {
        LOGIN,
        VIEW_ACCOUNT
    }

    private State currentState;
    private Page currentPage;

    final JPanel pageContainer = new JPanel();

    Session() {
        // Set the initial state and page
        this.currentState = State.LOGIN;
        this.currentPage = new LoginPage(this);

        // Configure the page container
        this.pageContainer.setLayout(new FlowLayout(FlowLayout.CENTER));
        this.pageContainer.add(currentPage);
    }

    public boolean isLoggedIn() {
        return this.currentState != State.LOGIN;
    }

    /**
     * Tries to log into an account with the provided credentials.
     * 
     * @return <code>true</code> if the login was successful, <code>false</code> otherwise.
     */
    boolean login(final String loginName, final char[] password) {
        // Throw an error if this session is already logged in
        if (this.isLoggedIn()) {
            throw new IllegalStateException("Session already logged in to an account.");
        }

        // Just print the values for now
        System.out.println("Login Name: " + loginName);
        System.out.println("Password: " + new String(password));

        // TODO Actually perform the login and advance the state if successful

        // SECURITY: Clear the password after it has been used (no credential residues)
        Arrays.fill(password, (char) 0);

        return this.isLoggedIn();
    }

}
