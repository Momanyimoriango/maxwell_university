def main_menu():
    print("---- TODO LIST APPLICATION ----")
    print("1. Add Task")
    print("2. List Tasks")
    print("3. Mark Task as Complete")
    print("4. Delete Task")
    print("0. Exit")

    choice = input("Enter your choice: ")
    return choice
def main():
    while True:
        choice = main_menu()

        if choice == '1':
            add_task()
        elif choice == '2':
            list_tasks()
        elif choice == '3':
            mark_task_complete()
        elif choice == '4':
            delete_task()
        elif choice == '0':
            print("Exiting the application...")
            break
        else:
            print("Invalid choice. Please try again.")

if __name__ == '__main__':
    main()
tasks = []

def main_menu():
    print("---- TODO LIST APPLICATION ----")
    print("1. Add Task")
    print("2. List Tasks")
    print("3. Mark Task as Complete")
    print("4. Delete Task")
    print("0. Exit")

def add_task():
    task_name = input("Enter task name: ")
    tasks.append(task_name)
    print("Task added successfully!")

def list_tasks():
    if not tasks:
        print("No tasks found.")
    else:
        print("---- TASK LIST ----")
        for index, task in enumerate(tasks, start=1):
            print(f"{index}. {task}")

def mark_task_complete():
    list_tasks()
    if not tasks:
        return

    task_index = int(input("Enter the task number to mark as complete: "))
    if task_index < 1 or task_index > len(tasks):
        print("Invalid task number. Please try again.")
        return

    task_name = tasks[task_index - 1]
    tasks.remove(task_name)
    print(f"Task '{task_name}' marked as complete.")

def delete_task():
    list_tasks()
    if not tasks:
        return

    task_index = int(input("Enter the task number to delete: "))
    if task_index < 1 or task_index > len(tasks):
        print("Invalid task number. Please try again.")
        return

    task_name = tasks[task_index - 1]
    tasks.remove(task_name)
    print(f"Task '{task_name}' deleted successfully.")

def main():
    while True:
        main_menu()
        choice = input("Enter your choice: ")

        if choice == '1':
            add_task()
        elif choice == '2':
            list_tasks()
        elif choice == '3':
            mark_task_complete()
        elif choice == '4':
            delete_task()
        elif choice == '0':
            print("Exiting the application...")
            break
        else:
            print("Invalid choice. Please try again.")

if __name__ == '__main__':
    main()
