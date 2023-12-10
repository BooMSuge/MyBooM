-- 创建老板表，每个老板有一个唯一的ID和名字
CREATE TABLE Bosses (
    BossID INT AUTO_INCREMENT PRIMARY KEY, -- 自增的主键字段，唯一标识一个老板
    Name VARCHAR(255) NOT NULL -- 老板的名字，不允许为空
);

-- 创建陪玩表，每个陪玩有一个唯一的ID和名字
CREATE TABLE Companions (
    CompanionID INT AUTO_INCREMENT PRIMARY KEY, -- 自增的主键字段，唯一标识一个陪玩
    Name VARCHAR(255) NOT NULL -- 陪玩的名字，不允许为空
);

-- 创建游戏品类表，每个游戏品类有一个唯一的ID、品类名称和价格
CREATE TABLE GameCategories (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY, -- 自增的主键字段，唯一标识一个游戏品类
    CategoryName VARCHAR(255) NOT NULL, -- 游戏品类的名称，不允许为空
    Price DECIMAL(10, 2) NOT NULL -- 游戏品类的价格，不允许为空
);

-- 创建订单表，包含订单的详细信息以及与老板和陪玩的关联
CREATE TABLE Orders (
    OrderID INT AUTO_INCREMENT PRIMARY KEY, -- 自增的主键字段，唯一标识一个订单
    BossID INT, -- 关联老板表的外键
    CompanionID INT, -- 关联陪玩表的外键
    CategoryID INT, -- 关联游戏品类表的外键
    Duration INT, -- 接单时长
    StartTime DATETIME, -- 开始时间
    EndTime DATETIME, -- 结束时间
    CustomerService VARCHAR(255), -- 审核客服的名字
    FOREIGN KEY (BossID) REFERENCES Bosses(BossID), -- 老板ID外键关联
    FOREIGN KEY (CompanionID) REFERENCES Companions(CompanionID), -- 陪玩ID外键关联
    FOREIGN KEY (CategoryID) REFERENCES GameCategories(CategoryID) -- 游戏品类ID外键关联
);

-- 创建财务记录表，用来追踪订单的财务变动
CREATE TABLE FinancialRecords (
    RecordID INT AUTO_INCREMENT PRIMARY KEY, -- 自增的主键字段，唯一标识一条财务记录
    OrderID INT, -- 关联订单表的外键
    DeductedAmount DECIMAL(10, 2), -- 订单的扣除金额
    RemainingBalance DECIMAL(10, 2), -- 老板的剩余余额
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID) -- 订单ID外键关联
);
