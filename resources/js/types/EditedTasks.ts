import type { Task } from "./task";

export type EditedTasks = {
  super: {
    [key: string]: Task[];
  };
  warning: {
    [key: string]: Task[];
  };
  normal: {
    [key: string]: Task[];
  }
}
