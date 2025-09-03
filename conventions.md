Here’s your conventions translated into English, keeping the meaning intact but polishing the phrasing for clarity and professionalism:

---

# Code Conventions

This document describes the code conventions that must be followed to ensure readability, maintainability, and consistency across the codebase.

## Table of Contents

1. [Naming Conventions](#naming-conventions)
2. [Indentation](#indentation)
3. [Whitespace](#whitespace)
4. [Comments](#comments)
5. [Functions](#functions)
6. [Error Prevention](#error-prevention)
7. [File Naming and Directory Structure](#file-naming-and-directory-structure)

---

## Naming Conventions

* **Variables and functions**: Use `lowerCamelCase` for variables and functions.

## Whitespace

* Avoid excessive whitespace. Limit blank lines to a maximum of one between sections.

## Indentation

* **Indentation**: Follow a clear parent–child relationship in code structure.

## Comments

* **Comments**: Use comments for complex logic or non-obvious behavior. Avoid adding comments for standard CRUD operations.

## Functions

* Ensure database connections are handled through functions (e.g., for login functionality).

## Error Prevention

* Investigate and understand errors before committing code. Do not push to Git with known errors to prevent broken code from being published.

## File Naming and Directory Structure

* Place each new quiz in its own directory, making it easy to find and ensuring everything stays organized centrally.
