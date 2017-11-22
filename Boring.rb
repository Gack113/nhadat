class World < ActiveRecord::Base
    has_many :people
end

class Person < ActiveRecord::Base
    def self.search(key)
        find(:all, :condition => ["signal = ?",key])
    end
end

World.all.people.search("alone").take